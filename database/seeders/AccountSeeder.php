<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = array(
            'fullname' => [
                'Rahadyan Rizqy',
                'Titan Anggaraksa',
                'Ahmad Amin',
            ],
            'email' => [
                'rahadyanrizqy@gmail.com',
                'razorlupical@triots.com',
                'sometimesone@triots.com',
            ],
            'password' => [
                'RadenRizqy2023!',
                'TitanAngga2004!',
                'AhmadAmin2005!',
            ],
            'role' => [
                1,
                2,
                2,
            ],
            'saldo' => [
                0,
                10000000,
                10000000,
            ],
            'ccnum' => [
                '0000-0000-0000-0000',
                '1234-6789-0000-0001',
                '5902-5509-2123-8901',
            ],
            'cvv' => [
                '273',
                '231',
                '212',
            ],
            'exp' => [
                '2023/04',
                '2026/07',
                '2028/04',
            ]
        );

        $faker = Faker::create();
        for ($i = 0; $i < count($accounts['email']); $i++) {
            Account::create([
                'fullname' => $accounts['fullname'][$i],
                'email' => $accounts['email'][$i],
                'password' => Hash::make($accounts['password'][$i]),
                'registered_at' => $faker->dateTimeBetween('2023-05-29 00:00:00', '2023-06-29 00:00:00')->format('Y-m-d H:i:s'),
                'role_fk' => $accounts['role'][$i],
                'balance' => $accounts['saldo'][$i],
                'cc_number' => $accounts['ccnum'][$i],
                'cc_cvv' => $accounts['cvv'][$i],
                'cc_expire' => $accounts['exp'][$i]
            ]);
        }
        // Account::create(['email' => 'radenrizqy@mail.net', 'password' => 'raden']);
    }
}
