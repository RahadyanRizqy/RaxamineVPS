<?php

namespace Database\Seeders;

use App\Models\MemoryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemoryType::create(
            ['memory_type_name' => 'RAM'],
        );   

        MemoryType::create(
            ['memory_type_name' => 'ROM'],
        );   
    }
}
