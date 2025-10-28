<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class OdooService {
    protected $url;
    protected $db;
    protected $username;
    protected $password;
    protected $uid;
    protected $client;
    protected $cookieJar;

    public function __construct() {
        $this->url = config('services.odoo.url');
        $this->db = config('services.odoo.database');
        $this->username = config('services.odoo.username');
        $this->password = config('services.odoo.password');
        $this->cookieJar = new \GuzzleHttp\Cookie\CookieJar();
        $this->client = new Client([
            'base_uri' => $this->url,
            'timeout' => 30,
            'cookies' => $this->cookieJar,
            'headers' => [
                'Content-Type' => 'application/json; charset=utf-8',
                'Accept-Charset' => 'utf-8',
            ],
        ]);
    }

    /**
     * Аутентификация в Odoo через JSON-RPC
     */
    public function authenticate() {
        try {
            $response = $this->client->post('/web/session/authenticate', [
                'json' => [
                    'jsonrpc' => '2.0',
                    'params' => [
                        'db' => $this->db,
                        'login' => $this->username,
                        'password' => $this->password,
                    ],
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['error'])) {
                throw new Exception($data['error']['message'] ?? 'Authentication failed');
            }

            if (isset($data['result']['uid'])) {
                $this->uid = $data['result']['uid'];
                return $this->uid;
            }

            throw new Exception('Authentication failed: UID not received');
        } catch (Exception $e) {
            Log::error('Odoo Authentication Error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Выполнить запрос к Odoo API через JSON-RPC
     */
    protected function execute($model, $method, $args = []) {
        if (!$this->uid) {
            $this->authenticate();
        }

        try {
            $response = $this->client->post('/web/dataset/call_kw', [
                'json' => [
                    'jsonrpc' => '2.0',
                    'method' => 'call',
                    'params' => [
                        'model' => $model,
                        'method' => $method,
                        'args' => $args,
                        'kwargs' => (object) [],
                    ],
                    'id' => rand(1, 1000000),
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['error'])) {
                throw new Exception($data['error']['data']['message'] ?? $data['error']['message'] ?? 'Odoo API Error');
            }

            return $data['result'] ?? null;
        } catch (Exception $e) {
            Log::error('Odoo Execute Error: ' . $e->getMessage(), [
                'model' => $model,
                'method' => $method,
            ]);
            throw $e;
        }
    }

    /**
     * Создать контакт (клиента) в Odoo
     */
    public function createContact($data) {
        $contactData = [
            'name' => $data['name'],
            'email' => $data['email'] ?? null,
            'phone' => $data['phone'] ?? null,
            'street' => $data['address'] ?? null,
            'city' => $data['city'] ?? null,
            'zip' => $data['zip'] ?? null,
            'country_id' => $data['country_id'] ?? null,
            'customer_rank' => 1, // Пометить как клиента
        ];

        return $this->execute('res.partner', 'create', [$contactData]);
    }

    /**
     * Найти контакт по email
     */
    public function findContactByEmail($email) {
        $contactIds = $this->execute('res.partner', 'search', [[['email', '=', $email]]]);

        if (empty($contactIds)) {
            return null;
        }

        $contacts = $this->execute('res.partner', 'read', [$contactIds, ['name', 'email', 'phone', 'id']]);

        return $contacts[0] ?? null;
    }

    /**
     * Создать счет (invoice) в Odoo
     */
    public function createInvoice($data) {
        $invoiceData = [
            'partner_id' => $data['partner_id'], // ID клиента в Odoo
            'move_type' => 'out_invoice', // Исходящий счет
            'invoice_date' => date('Y-m-d'),
            'invoice_line_ids' => $data['invoice_lines'] ?? [],
        ];

        return $this->execute('account.move', 'create', [$invoiceData]);
    }

    /**
     * Создать строки счета из заказа Laravel
     */
    public function prepareInvoiceLines($orderItems) {
        $lines = [];

        foreach ($orderItems as $item) {
            $lines[] = [
                0, 0, [ // Odoo формат для создания записей
                    'name' => $item['product_name'],
                    'quantity' => $item['quantity'],
                    'price_unit' => $item['price'],
                ]
            ];
        }

        return $lines;
    }

    /**
     * Получить или создать клиента в Odoo
     */
    public function getOrCreateContact($userData) {
        // Проверяем существует ли клиент
        $contact = $this->findContactByEmail($userData['email']);

        if ($contact) {
            return $contact['id'];
        }

        // Создаем нового клиента
        return $this->createContact($userData);
    }

    /**
     * Создать полный счет из заказа Laravel
     */
    public function createInvoiceFromOrder($order) {
        try {
            // 1. Получить или создать контакт
            $contactData = [
                'name' => $order->name,
                'email' => $order->email,
                'phone' => $order->mobile,
                'address' => $order->address,
                'city' => $order->city ?? null,
                'zip' => $order->pincode ?? null,
            ];

            $partnerId = $this->getOrCreateContact($contactData);

            // 2. Подготовить строки счета
            $invoiceLines = [];
            foreach ($order->orders_products as $item) {
                $invoiceLines[] = [
                    0, 0, [
                        'name' => $item->product_name . ' (' . $item->product_code . ') - Size: ' . $item->product_size,
                        'quantity' => $item->product_qty,
                        'price_unit' => $item->product_price,
                    ]
                ];
            }

            // 3. Создать счет
            $invoiceId = $this->createInvoice([
                'partner_id' => $partnerId,
                'invoice_lines' => $invoiceLines,
            ]);

            Log::info('Odoo Invoice Created', [
                'order_id' => $order->id,
                'invoice_id' => $invoiceId,
            ]);

            return $invoiceId;
        } catch (Exception $e) {
            Log::error('Odoo Invoice Creation Failed', [
                'order_id' => $order->id,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * Получить счет по ID
     */
    public function getInvoice($invoiceId) {
        return $this->execute('account.move', 'read', [[$invoiceId], ['id', 'name', 'partner_id', 'state', 'amount_total', 'invoice_date']]);
    }

    /**
     * Поиск счетов
     */
    public function searchInvoices($domain = []) {
        $invoiceIds = $this->execute('account.move', 'search', [$domain]);
        if (empty($invoiceIds)) {
            return [];
        }
        return $this->execute('account.move', 'read', [$invoiceIds, ['id', 'name', 'partner_id', 'state', 'amount_total', 'invoice_date']]);
    }

    /**
     * Поиск контактов
     */
    public function searchContacts($domain = []) {
        $contactIds = $this->execute('res.partner', 'search', [$domain]);
        if (empty($contactIds)) {
            return [];
        }
        return $this->execute('res.partner', 'read', [$contactIds, ['id', 'name', 'email', 'phone']]);
    }

    /**
     * Обновить контакт
     */
    public function updateContact($id, $data) {
        return $this->execute('res.partner', 'write', [[$id], $data]);
    }

    /**
     * Удалить контакты
     */
    public function deleteContacts($ids) {
        return $this->execute('res.partner', 'unlink', [$ids]);
    }

    /**
     * Удалить счета
     */
    public function deleteInvoices($ids) {
        return $this->execute('account.move', 'unlink', [$ids]);
    }

    /**
     * Создать товар в Odoo
     */
    public function createProduct($data) {
        $productData = [
            'name' => $data['name'],
            'default_code' => $data['code'] ?? null, // SKU/артикул
            'list_price' => $data['price'] ?? 0, // Цена продажи
            'description' => $data['description'] ?? null,
        ];

        return $this->execute('product.product', 'create', [$productData]);
    }

    /**
     * Найти товар по коду (SKU)
     */
    public function findProductByCode($code) {
        $productIds = $this->execute('product.product', 'search', [[['default_code', '=', $code]]]);

        if (empty($productIds)) {
            return null;
        }

        $products = $this->execute('product.product', 'read', [$productIds, ['id', 'name', 'default_code', 'list_price']]);

        return $products[0] ?? null;
    }

    /**
     * Обновить товар в Odoo
     */
    public function updateProduct($id, $data) {
        return $this->execute('product.product', 'write', [[$id], $data]);
    }

    /**
     * Создать или обновить товар в Odoo
     */
    public function createOrUpdateProduct($productData) {
        $code = $productData['code'] ?? $productData['product_code'];
        $existingProduct = $this->findProductByCode($code);

        $data = [
            'name' => $productData['name'] ?? $productData['product_name'],
            'default_code' => $code,
            'list_price' => $productData['price'] ?? $productData['product_price'] ?? 0,
            'description' => $productData['description'] ?? $productData['product_desc'] ?? null,
        ];

        if ($existingProduct) {
            $this->updateProduct($existingProduct['id'], $data);
            return $existingProduct['id'];
        } else {
            return $this->createProduct($data);
        }
    }

    /**
     * Получить все товары из Odoo
     */
    public function getAllProducts($codePrefix = null, $includeImages = false) {
        $domain = [['sale_ok', '=', true]];

        // Фильтр по префиксу кода (например, только JWL-)
        if ($codePrefix) {
            $domain[] = ['default_code', 'like', $codePrefix . '%'];
        }

        $productIds = $this->execute('product.product', 'search', [$domain]);

        if (empty($productIds)) {
            return [];
        }

        $fields = ['id', 'name', 'default_code', 'list_price', 'description', 'qty_available', 'categ_id'];

        if ($includeImages) {
            $fields[] = 'image_1920'; // Полное изображение в base64
        }

        return $this->execute('product.product', 'read', [$productIds, $fields]);
    }

    /**
     * Получить категории из Odoo
     */
    public function getCategories() {
        $categoryIds = $this->execute('product.category', 'search', [[]]);

        if (empty($categoryIds)) {
            return [];
        }

        return $this->execute('product.category', 'read', [
            $categoryIds,
            ['id', 'name', 'parent_id', 'complete_name']
        ]);
    }

    /**
     * Получить шаблоны товаров (product.template) с вариантами
     */
    public function getProductTemplates($domain = []) {
        $templateIds = $this->execute('product.template', 'search', [$domain]);

        if (empty($templateIds)) {
            return [];
        }

        return $this->execute('product.template', 'read', [
            $templateIds,
            ['id', 'name', 'default_code', 'list_price', 'categ_id', 'product_variant_ids', 'attribute_line_ids', 'image_1920']
        ]);
    }

    /**
     * Получить варианты конкретного товара
     */
    public function getProductVariants($variantIds) {
        if (empty($variantIds)) {
            return [];
        }

        return $this->execute('product.product', 'read', [
            $variantIds,
            ['id', 'name', 'default_code', 'list_price', 'product_template_attribute_value_ids', 'qty_available']
        ]);
    }

    /**
     * Получить значения атрибутов
     */
    public function getAttributeValues($valueIds) {
        if (empty($valueIds)) {
            return [];
        }

        return $this->execute('product.template.attribute.value', 'read', [
            $valueIds,
            ['id', 'name', 'attribute_id', 'product_attribute_value_id']
        ]);
    }


    /**
     * Тестовый метод для проверки подключения
     */
    public function testConnection() {
        try {
            $uid = $this->authenticate();

            // Получить информацию о текущем пользователе
            $userInfo = $this->execute('res.users', 'read', [[$uid], ['name', 'login']]);

            return [
                'success' => true,
                'uid' => $uid,
                'user' => $userInfo[0] ?? null,
                'database' => $this->db,
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }
}
