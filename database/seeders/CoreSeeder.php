<?php

namespace Database\Seeders;

use App\Models\Core;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cpu = [
            'core' => [
                1,
                2,
                4,
                1,
                2,
                4,
            ],

            'cpu_type' => [
                1,
                1,
                1,
                2,
                2,
                2,
            ],
            'core_price' => [
                0,
                10000,
                20000,
                0,
                5000,
                15000,
            ] 
        ];
        for ($i = 0; $i < count($cpu['core']); $i++) {
            Core::create([
                'core_qty' => $cpu['core'][$i],
                'cpu_fk' => $cpu['cpu_type'][$i],
                'core_price' => $cpu['core_price'][$i],
            ]);
        }
        //
    }
}
