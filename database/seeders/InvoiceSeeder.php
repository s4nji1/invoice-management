<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;

class InvoiceSeeder extends Seeder
{
    public function run()
    {
        $invoices = [
            [
                'client_name' => 'Hamza',
                'invoice_date' => '2024-12-01',
                'amount' => 250.00,
                'status' => 'unpaid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Yassine',
                'invoice_date' => '2024-11-15',
                'amount' => 500.00,
                'status' => 'unpaid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Rachid',
                'invoice_date' => '2024-11-20',
                'amount' => 1000.00,
                'status' => 'unpaid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Saad',
                'invoice_date' => '2024-11-20',
                'amount' => 1500.00,
                'status' => 'unpaid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Lina',
                'invoice_date' => '2024-11-20',
                'amount' => 2000.00,
                'status' => 'unpaid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Oumaima',
                'invoice_date' => '2024-11-20',
                'amount' => 700.00,
                'status' => 'unpaid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Invoice::insert($invoices);
    }
}
