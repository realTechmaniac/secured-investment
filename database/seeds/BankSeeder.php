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
            'token' => Str::random(40),
        ]);

        BankDetail::create([
            'user_id' => 2,
            'full_name' => 'Adewale Akinlolu',
            'bank_name' => 'Diamond Bank',
            'account_number' => '1091679798',
            'token' => Str::random(40),
        ]);

        BankDetail::create([
            'user_id' => 3,
            'full_name' => 'Ajay Maximum',
            'bank_name' => 'Orange Bank',
            'account_number' => '0973679798',
            'token' => Str::random(40),
        ]);

        BankDetail::create([
            'user_id' => 4,
            'full_name' => 'Bisola Adewale',
            'bank_name' => 'Stanbic IBTC Bank',
            'account_number' => '1234601298',
            'token' => Str::random(40),
        ]);

        BankDetail::create([
            'user_id' => 5,
            'full_name' => 'Foluke Akande',
            'bank_name' => 'Golden Bank',
            'account_number' => '1236539798',
            'token' => Str::random(40),
        ]);

        BankDetail::create([
            'user_id' => 6,
            'full_name' => 'Akinolu Akanbi',
            'bank_name' => 'First Bank',
            'account_number' => '9744679798',
            'token' => Str::random(40),
        ]);

        BankDetail::create([
            'user_id' => 7,
            'full_name' => 'Helena Martins',
            'bank_name' => 'Keystone Bank',
            'account_number' => '0987369798',
            'token' => Str::random(40),
        ]);

        BankDetail::create([
            'user_id' => 8,
            'full_name' => 'Maryanne Mubarak',
            'bank_name' => 'Access Bank',
            'account_number' => '9744609837',
            'token' => Str::random(40),
        ]);

        BankDetail::create([
            'user_id' => 9,
            'full_name' => 'Justina Adekunle',
            'bank_name' => 'Skye Bank',
            'account_number' => '9742736598',
            'token' => Str::random(40),
        ]);

        BankDetail::create([
            'user_id' => 10,
            'full_name' => 'Femi Alabi',
            'bank_name' => 'Oceanic Bank',
            'account_number' => '9950679625',
            'token' => Str::random(40),
        ]);




    }
}
