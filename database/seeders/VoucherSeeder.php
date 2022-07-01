<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Voucher::create(['code' => 'CODE10', 'discount_percent' => 10]);
        Voucher::create(['code' => 'CODE20', 'discount_percent' => 20]);
        Voucher::create(['code' => 'CODE30-1', 'discount_percent' => 30, 'product_id' => 1]);
        Voucher::create(['code' => 'CODE30-2', 'discount_percent' => 30, 'product_id' => 2]);
        Voucher::create(['code' => 'CODE30-3', 'discount_percent' => 30, 'product_id' => 3]);
    }
}
