<?php

namespace App\Console\Commands;

use App\Services\OdooService;
use Illuminate\Console\Command;

class TestOdooConnection extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'odoo:test {action=connection}
                            {--email= : Email для поиска/создания контакта}
                            {--name= : Имя для создания контакта}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Тестирование подключения и работы с Odoo API';

    /**
     * Execute the console command.
     */
    public function handle() {
        $odoo = new OdooService();
        $action = $this->argument('action');

        switch ($action) {
            case 'connection':
                $this->testConnection($odoo);
                break;

            case 'create-contact':
                $this->testCreateContact($odoo);
                break;

            case 'find-contact':
                $this->testFindContact($odoo);
                break;

            case 'create-invoice':
                $this->testCreateInvoice($odoo);
                break;

            default:
                $this->error('Неизвестное действие: ' . $action);
                $this->info('Доступные действия: connection, create-contact, find-contact, create-invoice');
        }

        return 0;
    }

    /**
     * Тест подключения к Odoo
     */
    protected function testConnection(OdooService $odoo) {
        $this->info('🔌 Тестирование подключения к Odoo...');

        $result = $odoo->testConnection();

        if ($result['success']) {
            $this->info('✅ Подключение успешно!');
            $this->info('   User ID: ' . $result['uid']);
            $this->info('   База данных: ' . $result['database']);
            if (isset($result['user'])) {
                $this->info('   Пользователь: ' . ($result['user']['name'] ?? 'N/A'));
            }
        } else {
            $this->error('❌ Ошибка подключения: ' . $result['error']);
        }
    }

    /**
     * Тест создания контакта
     */
    protected function testCreateContact(OdooService $odoo) {
        $email = $this->option('email') ?? 'test@test.com';
        $name = $this->option('name') ?? 'Test Customer';

        $this->info('👤 Создание контакта в Odoo...');
        $this->info('   Email: ' . $email);
        $this->info('   Имя: ' . $name);

        try {
            $contactId = $odoo->createContact([
                'name' => $name,
                'email' => $email,
                'phone' => '+996 555 123 456',
            ]);

            $this->info('✅ Контакт создан! ID: ' . $contactId);
        } catch (\Exception $e) {
            $this->error('❌ Ошибка создания контакта: ' . $e->getMessage());
        }
    }

    /**
     * Тест поиска контакта
     */
    protected function testFindContact(OdooService $odoo) {
        $email = $this->option('email') ?? 'test@test.com';

        $this->info('🔍 Поиск контакта в Odoo...');
        $this->info('   Email: ' . $email);

        try {
            $contact = $odoo->findContactByEmail($email);

            if ($contact) {
                $this->info('✅ Контакт найден!');
                $this->info('   ID: ' . $contact['id']);
                $this->info('   Имя: ' . $contact['name']);
                $this->info('   Email: ' . $contact['email']);
            } else {
                $this->warn('⚠️  Контакт не найден');
            }
        } catch (\Exception $e) {
            $this->error('❌ Ошибка поиска: ' . $e->getMessage());
        }
    }

    /**
     * Тест создания счета
     */
    protected function testCreateInvoice(OdooService $odoo) {
        $email = $this->option('email') ?? 'test@test.com';

        $this->info('📄 Создание тестового счета в Odoo...');

        try {
            // Получить или создать контакт
            $partnerId = $odoo->getOrCreateContact([
                'name' => 'Test Customer',
                'email' => $email,
            ]);

            $this->info('   Контакт ID: ' . $partnerId);

            // Создать счет
            $invoiceId = $odoo->createInvoice([
                'partner_id' => $partnerId,
                'invoice_lines' => [
                    [0, 0, [
                        'name' => 'Тестовый товар',
                        'quantity' => 2,
                        'price_unit' => 1000,
                    ]],
                    [0, 0, [
                        'name' => 'Доставка',
                        'quantity' => 1,
                        'price_unit' => 500,
                    ]],
                ],
            ]);

            $this->info('✅ Счет создан! ID: ' . $invoiceId);
            $this->info('   Проверь в Odoo: http://localhost:8069');
        } catch (\Exception $e) {
            $this->error('❌ Ошибка создания счета: ' . $e->getMessage());
            $this->error('   ' . $e->getTraceAsString());
        }
    }
}
