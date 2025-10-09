<?php

namespace seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('coupons')->insert([
            [
                'name' => 'اولین خرید',
                'code' => 'WELCOME10',
                'type' => 2,
                'amount' => 0,
                'percentage' => 10,
                'max_percentage_amount' => 50,
                'expired_at' => $now->copy()->addMonth(),
                'desc' => '10% off on first purchase, max $50 discount',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'همون همیشگی',
                'code' => 'FIXED20',
                'type' => 1,
                'amount' => 20,
                'percentage' => null,
                'max_percentage_amount' => null,
                'expired_at' => $now->copy()->addWeeks(2),
                'desc' => '$20 off on orders over $100',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'فروش ویژه',
                'code' => 'SUMMER15',
                'type' => 2,
                'amount' => 0,
                'percentage' => 15,
                'max_percentage_amount' => 100,
                'expired_at' => $now->copy()->addMonth(3),
                'desc' => '15% off during summer, max $100 discount',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'تولد',
                'code' => 'BDAY25',
                'type' => 1,
                'amount' => 25000,
                'percentage' => null,
                'max_percentage_amount' => null,
                'expired_at' => $now->copy()->addYear(),
                'desc' => '$25 off for birthday celebrations',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'خرید جدید',
                'code' => 'FLASH50',
                'type' => 2,
                'amount' => 0,
                'percentage' => 50,
                'max_percentage_amount' => 30,
                'expired_at' => $now->copy()->addDays(7),
                'desc' => '50% off select items, max $30 discount - limited time',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
