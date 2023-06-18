<?php

namespace Database\Seeders;

use App\Models\OperatingSystem;
use App\Models\VPS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $os = array(
        //     'name' => [
        //         'Ubuntu',
        //         'CentOS',
        //         'RedHat',
        //         'Debian',
        //         'Fedora',
        //         'Arch',
        //     ],
        //     'version' => [
        //         // '["2022", "2019", "2016", "2012 R2", "2012", "2008 R2"]',
        //         '["22.04", "20.04", "18.04", "16.04", "14.04"]',
        //         '["8.4-2105", "8.3-2011", "8.2-2004", "8.1-1911", "8.0-1905", "7.9-2009", "7.8-2003"]',
        //         '["9.2", "9.1", "9.0", "8.8", "8.7", "8.6", "8.5", "8.4", "8.3", "8.2", "8.1", "7.9", "7.8", "7.7"]',
        //         '["11", "10", "9", "8", "7", "6"]',
        //         '["39", "38", "37", "36", "35", "34", "33", "32", "31"]',
        //         '["2023.06.01", "2023.05.03", "2023.04.01"]',
        //     ],
        //     'price' => [
        //         55000,
        //         50000,
        //         45000,
        //         40000,
        //         35000,
        //         30000,
        //     ]
        // );

        // for ($i = 0; $i < count($os['name']); $i++) {
        //     VPS::create([
        //         'name' => $os['name'][$i],
        //         'version' => $os['version'][$i],
        //         'price' => $os['price'][$i],
        //     ]);
        // }
        $os = array(
            'name' => [
                'Ubuntu',
                'CentOS',
                'RedHat',
                'Debian',
                'Fedora',
                'Arch',
            ],
            'price' => [
                40000,
                35000,
                30000,
                25000,
                20000,
                15000,
            ],
        );
        for ($i = 0; $i < count($os['name']); $i++) {
            OperatingSystem::create([
                'name' => $os['name'][$i],
                'price' => $os['price'][$i],
            ]);
        }
    }
}
