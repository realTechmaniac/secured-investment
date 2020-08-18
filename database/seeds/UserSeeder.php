<?php

use App\GetHelp;
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
            'phone_number' => '+2348186818135',
            'username' => 'stunner',
            'gender' => 'male',
            'token' => Str::random(40),
            'role' => 'ceo',
            'is_activated' => true,
            'activation' => 'subsequent',
            'sub_expires_at' => now()->addDays(90),
            'email' => 'stunner@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'first_name' => 'Adewale',
            'last_name' => 'Akinlolu',
            'phone_number' => '+2348186818182',
            'username' => 'adeboy',
            'gender' => 'male',
            'token' => Str::random(40),
            'is_activated' => true,
            'activation' => 'subsequent',
            'referred_from_id' => 1,
            'sub_expires_at' => now()->addDays(60),
            'email' => 'adeboy@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'first_name' => 'Ajay',
            'last_name' => 'Maximum',
            'phone_number' => '+2348186818144',
            'username' => 'maxy',
            'gender' => 'female',
            'token' => Str::random(40),
            'is_activated' => true,
            'activation' => 'subsequent',
            'referred_from_id' => 2,
            'sub_expires_at' => now()->addDays(30),
            'email' => 'maxy20@gmail.com',
            'password' => Hash::make('12345678'),
        ]);


        ReferrerDetail::create([
            'user_id' => 1,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 800000,
            'token' => Str::random(40),
        ]);
        ReferrerDetail::create([
            'user_id' => 2,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 200000,
            'token' => Str::random(40),
        ]);
        ReferrerDetail::create([
            'user_id' => 3,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 50000,
            'token' => Str::random(40),
        ]);

        GetHelp::create([
            'user_id' => 1,
            'amount' => 600000,
            'status' => 'pending',
            'token' => Str::random(40),
        ]);
        GetHelp::create([
            'user_id' => 2,
            'amount' => 800000,
            'status' => 'pending',
            'token' => Str::random(40),
        ]);
        GetHelp::create([
            'user_id' => 1,
            'amount' => 500000,
            'status' => 'pending',
            'token' => Str::random(40),
        ]);


    }
}
