<?php

use App\BankDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankDetail::create([
            'user_id' => 1,
            'full_name' => 'StuNNer Hensi',
            'bank_name' => 'Skye Bank',
            'account_number' => '1234679798',
            'account_type' => 'savings',
            'token' => Str::random(40),
        ]);
    }
}
