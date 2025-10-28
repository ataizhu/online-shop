<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Services\OdooService;
use Illuminate\Console\Command;

class TestOrderOdooIntegration extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'odoo:test-order {order_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Тестирование создания счета в Odoo из существующего заказа';

    /**
     * Execute the console command.
     */
    public function handle() {
        $orderId = $this->argument('order_id');

        if (!$orderId) {
            // Получить последний заказ
            $order = Order::with('orders_products')->orderBy('id', 'desc')->first();

            if (!$order) {
                $this->error('❌ Заказов в системе нет!');
                return 1;
            }

            $orderId = $order->id;
            $this->info('📦 Используется последний заказ: #' . $orderId);
        } else {
            $order = Order::with('orders_products')->find($orderId);

            if (!$order) {
                $this->error('❌ Заказ #' . $orderId . ' не найден!');
                return 1;
            }
        }

        $this->info('🔄 Создание счета в Odoo для заказа #' . $order->id);
        $this->info('   Клиент: ' . $order->name);
        $this->info('   Email: ' . $order->email);
        $this->info('   Товаров: ' . $order->orders_products->count());
        $this->info('   Сумма: ' . $order->grand_total);
        $this->newLine();

        try {
            $odoo = new OdooService();
            $invoiceId = $odoo->createInvoiceFromOrder($order);

            $this->info('✅ Счет успешно создан в Odoo!');
            $this->info('   Invoice ID: ' . $invoiceId);
            $this->info('   Проверь в Odoo: http://localhost:8069');
            $this->newLine();
            $this->info('💡 Перейди: Invoicing → Customers → Invoices');

            return 0;
        } catch (\Exception $e) {
            $this->error('❌ Ошибка создания счета: ' . $e->getMessage());
            $this->error('   ' . $e->getFile() . ':' . $e->getLine());

            return 1;
        }
    }
}
