<?php

use App\GetHelp;
use App\ProvideHelp;
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
        /*User 1*/
        User::create([
            'first_name' => 'StuNNer',
            'last_name' => 'Hensi',
            'phone_number' => '+2348186818135',
            'username' => 'stunner',
            'gender' => 'male',
            'is_guider' => true,
            'token' => Str::random(40),
            'role' => 'ceo',
            'is_activated' => true,
            'activation' => 'subsequent',
            'sub_expires_at' => now()->addDays(90),
            'email' => 'stunner@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        /*User 2*/
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

        /*User 3*/
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

        /*User 4*/
        User::create([
            'first_name' => 'Bisola',
            'last_name' => 'Adewale',
            'phone_number' => '+2348186816723',
            'username' => 'bizzy',
            'gender' => 'female',
            'token' => Str::random(40),
            'referred_from_id' => 2,
            'email' => 'bizzy@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        /*User 5*/
        User::create([
            'first_name' => 'Foluke',
            'last_name' => 'Akande',
            'phone_number' => '+2348186818101',
            'username' => 'folly',
            'gender' => 'female',
            'token' => Str::random(40),
            'referred_from_id' => 1,
            'email' => 'folly@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        /*User 6*/
        User::create([
            'first_name' => 'Akinolu',
            'last_name' => 'Akanbi',
            'phone_number' => '+2348186818824',
            'username' => 'akin',
            'gender' => 'male',
            'token' => Str::random(40),
            'referred_from_id' => 2,
            'email' => 'akin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        /*User 7*/
        User::create([
            'first_name' => 'Helena',
            'last_name' => 'Martins',
            'phone_number' => '+2348183874524',
            'username' => 'helmatz',
            'gender' => 'female',
            'token' => Str::random(40),
            'is_activated' => true,
            'activation' => 'subsequent',
            'referred_from_id' => 1,
            'sub_expires_at' => now()->addDays(30),
            'email' => 'helmatz@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        /*User 8*/
        User::create([
            'first_name' => 'Maryanne',
            'last_name' => 'Mubarak',
            'phone_number' => '+2348186996821',
            'username' => 'mayree',
            'gender' => 'female',
            'role' => 'admin',
            'token' => Str::random(40),
            'is_activated' => true,
            'activation' => 'subsequent',
            'referred_from_id' => 2,
            'sub_expires_at' => now()->addDays(30),
            'email' => 'marymubs@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        /*User 9*/
        User::create([
            'first_name' => 'Justina',
            'last_name' => 'Adekunle',
            'phone_number' => '+2348186734824',
            'username' => 'tina',
            'gender' => 'female',
            'token' => Str::random(40),
            'is_activated' => true,
            'activation' => 'subsequent',
            'referred_from_id' => 4,
            'sub_expires_at' => now()->addDays(30),
            'email' => 'teena@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        /*User 10*/
        User::create([
            'first_name' => 'Femi',
            'last_name' => 'Alabi',
            'phone_number' => '+2348140918824',
            'username' => 'alabi23',
            'gender' => 'male',
            'token' => Str::random(40),
            'is_activated' => true,
            'activation' => 'subsequent',
            'referred_from_id' => 2,
            'sub_expires_at' => now()->addDays(30),
            'email' => 'alabi2019@gmail.com',
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
        ReferrerDetail::create([
            'user_id' => 4,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 8300,
            'token' => Str::random(40),
        ]);
        ReferrerDetail::create([
            'user_id' => 5,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 2000,
            'token' => Str::random(40),
        ]);
        ReferrerDetail::create([
            'user_id' => 6,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 0,
            'token' => Str::random(40),
        ]);
        ReferrerDetail::create([
            'user_id' => 7,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 0,
            'token' => Str::random(40),
        ]);
        ReferrerDetail::create([
            'user_id' => 8,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 2000,
            'token' => Str::random(40),
        ]);
        ReferrerDetail::create([
            'user_id' => 9,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 10000,
            'token' => Str::random(40),
        ]);
        ReferrerDetail::create([
            'user_id' => 10,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 40000,
            'token' => Str::random(40),
        ]);


        GetHelp::create([
            'user_id' => 1,
            'amount' => 600000,
            'to_balance' => 600000,
            'profit' => 10000,
            'status' => 'pending',
            'sub_expires_at' => now()->addDays(90),
            'token' => Str::random(40),
        ]);
        GetHelp::create([
            'user_id' => 2,
            'amount' => 800000,
            'to_balance' => 800000,
            'profit' => 90000,
            'status' => 'pending',
            'sub_expires_at' => now()->addDays(60),
            'token' => Str::random(40),
        ]);
        GetHelp::create([
            'user_id' => 3,
            'amount' => 20000,
            'to_balance' => 20000,
            'profit' => 1700,
            'status' => 'pending',
            'sub_expires_at' => now()->addDays(30),
            'token' => Str::random(40),
        ]);
        GetHelp::create([
            'user_id' => 7,
            'amount' => 5000,
            'to_balance' => 5000,
            'profit' => 200,
            'status' => 'pending',
            'sub_expires_at' => now()->addDays(30),
            'token' => Str::random(40),
        ]);

        ProvideHelp::create([
            'user_id' => 4,
            'amount' => 1000,
            'to_balance' => 1000,
            'is_activation_fee' => true,
            'token' => Str::random(40),
        ]);

        ProvideHelp::create([
            'user_id' => 5,
            'amount' => 1000,
            'to_balance' => 1000,
            'is_activation_fee' => true,
            'token' => Str::random(40),
        ]);

        ProvideHelp::create([
            'user_id' => 6,
            'amount' => 1000,
            'to_balance' => 1000,
            'is_activation_fee' => true,
            'token' => Str::random(40),
        ]);

        ProvideHelp::create([
            'user_id' => 8,
            'amount' => 400000,
            'to_balance' => 400000,
            'available_for_gh_at' => now()->addDays(3),
            'token' => Str::random(40),
        ]);

        ProvideHelp::create([
            'user_id' => 9,
            'amount' => 900000,
            'to_balance' => 900000,
            'available_for_gh_at' => now()->addDays(5),
            'token' => Str::random(40),
        ]);

        ProvideHelp::create([
            'user_id' => 10,
            'amount' => 300000,
            'to_balance' => 300000,
            'available_for_gh_at' => now()->addDays(5),
            'token' => Str::random(40),
        ]);
    }
}
