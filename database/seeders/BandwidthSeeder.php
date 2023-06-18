<?php

namespace Database\Seeders;

use App\Models\Bandwidth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BandwidthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bandwiths = 0;
        for ($i = 100; $i < 600; $i+=100){
            Bandwidth::create([
                'value' => $i,
                'price' => $bandwiths,
            ]);
            $bandwiths += 100;
        }
    }
}
