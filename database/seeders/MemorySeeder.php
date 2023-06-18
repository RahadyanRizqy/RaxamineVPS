<?php

namespace Database\Seeders;

use App\Models\Memory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MemorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $memories = array(
            'memory_size' => [
                '1GB',
                '2GB',
                '4GB',
                '6GB',
                '8GB',
                '16GB',

                '16GB',
                '32GB',
                '48GB',
                '64GB',
                '128GB',
                '256GB',
                '512GB',
                '1024GB',
            ],
            'memory_type' => [
                1,
                1,
                1,
                1,
                1,
                1,

                2,
                2,
                2,
                2,
                2,
                2,
                2,
                2,
            ],
            'memory_price' => [
                1000,
                2000,
                4000,
                6000,
                8000,
                10000,

                1000,
                5000,
                10000,
                15000,
                20000,
                25000,
                30000,
                35000,

            ]
        );

        $faker = Faker::create();
        for ($i = 0; $i < count($memories['memory_size']); $i++) {
            Memory::create([
                'memory_size' => $memories['memory_size'][$i],
                'memory_price' => $memories['memory_price'][$i],
                'memory_type_fk' => $memories['memory_type'][$i],
            ]);
        }
    }
}
