<?php

use App\ReferrerDetail;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'StuNNer',
            'last_name' => 'TheGreat',
            'phone' => '08186818135',
            'username' => 'stunner',
            'gender' => 'male',
            'token' => Str::random(40),
            'role' => 'ceo',
            'email' => 'stunner@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        ReferrerDetail::create([
            'user_id' => 1,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 20000,
            'token' => Str::random(40),
        ]);
    }
}
