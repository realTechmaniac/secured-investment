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
            'full_name' => 'ARISE OPEOLUWA DAVID ',
            'bank_name' => 'GTB',
            'account_number' => '0037492196',
            'token' => Str::random(40),
        ]);

        BankDetail::create([
            'user_id' => 2,
            'full_name' => 'JOLAOSHO RACHAEL DAMILOLA',
            'account_number' => '0695250344',
            'bank_name' => 'ACCESS BANK',
            'token' => Str::random(40),
        ]);

        BankDetail::create([
            'user_id' => 3,
            'full_name' => 'EPEBINU ABIMBOLA TEMITOPE',
            'account_number' => '0199220392',
            'bank_name' => 'GTB',
            'token' => Str::random(40),
        ]);

        BankDetail::create([
            'user_id' => 4,
            'full_name' => 'ARISE OPEOLUWA DAVID',
            'account_number' => '2083814794',
            'bank_name' => 'UBA',
            'token' => Str::random(40),
        ]);
    }
}
