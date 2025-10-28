<?php

namespace App\Console\Commands;

use App\Services\OdooService;
use Illuminate\Console\Command;

class OdooCleanup extends Command {
    protected $signature = 'odoo:cleanup {--contacts : Удалить контакты} {--invoices : Удалить счета} {--all : Удалить все}';
    protected $description = 'Очистка тестовых данных в Odoo';

    public function handle() {
        $odoo = new OdooService();

        if ($this->option('all') || $this->option('contacts')) {
            $this->deleteContacts($odoo);
        }

        if ($this->option('all') || $this->option('invoices')) {
            $this->deleteInvoices($odoo);
        }

        if (!$this->option('all') && !$this->option('contacts') && !$this->option('invoices')) {
            $this->listData($odoo);
        }

        return 0;
    }

    protected function listData($odoo) {
        $this->info('📋 Данные в Odoo:');
        $this->newLine();

        // Контакты
        $contacts = $odoo->searchContacts([['customer_rank', '>', 0]]);
        $this->info('👥 Клиенты (' . count($contacts) . '):');
        foreach ($contacts as $c) {
            $this->line('  ID ' . $c['id'] . ': ' . $c['name'] . ' (' . ($c['email'] ?? 'no email') . ')');
        }
        $this->newLine();

        // Счета
        $invoices = $odoo->searchInvoices([]);
        $this->info('📄 Счета (' . count($invoices) . '):');
        foreach ($invoices as $inv) {
            $this->line('  ID ' . $inv['id'] . ': ' . $inv['name'] . ' | ' . ($inv['partner_id'][1] ?? 'N/A') . ' | CHF ' . $inv['amount_total']);
        }
        $this->newLine();
        $this->comment('Для удаления используй: --contacts, --invoices или --all');
    }

    protected function deleteContacts($odoo) {
        $contacts = $odoo->searchContacts([['customer_rank', '>', 0]]);

        if (empty($contacts)) {
            $this->info('ℹ️  Клиентов для удаления нет');
            return;
        }

        $this->warn('🗑️  Удаление ' . count($contacts) . ' клиентов...');

        $ids = array_column($contacts, 'id');
        $odoo->deleteContacts($ids);

        $this->info('✅ Удалено клиентов: ' . count($ids));
    }

    protected function deleteInvoices($odoo) {
        $invoices = $odoo->searchInvoices([['state', '=', 'draft']]);

        if (empty($invoices)) {
            $this->info('ℹ️  Черновиков счетов для удаления нет');
            return;
        }

        $this->warn('🗑️  Удаление ' . count($invoices) . ' черновиков счетов...');

        $ids = array_column($invoices, 'id');
        $odoo->deleteInvoices($ids);

        $this->info('✅ Удалено счетов: ' . count($ids));
    }
}
