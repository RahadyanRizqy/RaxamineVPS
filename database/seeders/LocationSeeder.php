<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $location = [
            'label' => ['ID', 'SG', 'US', 'UK', 'JP'],
            'country' => ['Indonesia', 'Singapore', 'United States of America', 'United Kingdom', 'Japan'],
        ];
        $j = 0;
        for ($i = 0; $i < count($location['label']); $i++) {
            Location::create([
                'label' => $location['label'][$i],
                'country' => $location['country'][$i],
                'price' => $j,
            ]);
            $j += 10000;
        } 
    }
}
