<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        $seeders = [
            RoleSeeder::class,
            AccountSeeder::class,
            OSSeeder::class,
            // VersionSeeder::class,
            MemoryTypeSeeder::class,
            MemorySeeder::class,
            BandwidthSeeder::class,
            LocationSeeder::class,
            ServerSeeder::class,
            CPUSeeder::class,
            CoreSeeder::class,
            // ServiceSeeder::class,
            // ActivitySeeder::class,
            // TransactionSeeder::class,
        ];

        $this->call($seeders);
    }
}
