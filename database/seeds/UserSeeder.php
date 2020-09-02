<?php

use App\GetHelp;
use App\ProvideHelp;
use App\ReferrerDetail;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
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
            'first_name' => 'OPEOLUWA ',
            'last_name' => 'ARISE ',
            'phone_number' => '08138915762',
            'username' => 'Omoluabi2010',
            'gender' => 'male',
            'is_guider' => true,
            'token' => Str::random(40),
            'role' => 'ceo',
            'is_activated' => true,
            'activation' => 'subsequent',
            'sub_expires_at' => now()->addMonths(12),
            'email' => 'arise@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        /*User 2*/
        User::create([
            'first_name' => 'RACHAEL',
            'last_name' => 'JOLAOSHO',
            'phone_number' => '09051344421',
            'username' => 'Richygold',
            'gender' => 'female',
            'role' => 'admin',
            'token' => Str::random(40),
            'is_activated' => true,
            'activation' => 'subsequent',
            'sub_expires_at' => now()->addDays(30),
            'email' => 'richygold@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        /*User 3*/
        User::create([
            'first_name' => 'ABIMBOLA',
            'last_name' => 'EPEBINU',
            'phone_number' => '09050150516',
            'username' => 'bimsey',
            'role' => 'admin',
            'gender' => 'female',
            'is_activated' => true,
            'activation' => 'subsequent',
            'sub_expires_at' => now()->addDays(30),
            'token' => Str::random(40),
            'email' => 'bizzy@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        /*User 4*/
        User::create([
            'first_name' => 'OPEOLUWA',
            'last_name' => 'ARISE',
            'phone_number' => '09054991291',
            'username' => 'Daveopy',
            'gender' => 'male',
            'role' => 'admin',
            'token' => Str::random(40),
            'is_activated' => true,
            'activation' => 'subsequent',
            'sub_expires_at' => now()->addDays(30),
            'email' => 'daveopy@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        ReferrerDetail::create([
            'user_id' => 1,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 0,
            'token' => Str::random(40),
        ]);
        ReferrerDetail::create([
            'user_id' => 2,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 0,
            'token' => Str::random(40),
        ]);
        ReferrerDetail::create([
            'user_id' => 3,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 0,
            'token' => Str::random(40),
        ]);
        ReferrerDetail::create([
            'user_id' => 4,
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 0,
            'token' => Str::random(40),
        ]);


        GetHelp::create([
            'user_id' => 2,
            'amount' => 500000,
            'to_balance' => 500000,
            'profit' => 0,
            'status' => 'pending',
            'sub_expires_at' => now()->addDays(30),
            'token' => Str::random(40),
        ]);
        GetHelp::create([
            'user_id' => 3,
            'amount' => 800000,
            'to_balance' => 800000,
            'profit' => 0,
            'status' => 'pending',
            'sub_expires_at' => now()->addDays(30),
            'token' => Str::random(40),
        ]);
        GetHelp::create([
            'user_id' => 4,
            'amount' => 700000,
            'to_balance' => 700000,
            'profit' => 0,
            'status' => 'pending',
            'sub_expires_at' => now()->addDays(30),
            'token' => Str::random(40),
        ]);
    }
}
