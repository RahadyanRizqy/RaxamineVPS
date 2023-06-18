<?php

namespace Database\Seeders;

use App\Models\CPU;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CPUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CPU::create([
            'cpu_name' => 'Intel',
            'price' => 20000,
        ]);
        CPU::create([
            'cpu_name' => 'AMD',
            'price' => 10000,
        ]);
    }
}
