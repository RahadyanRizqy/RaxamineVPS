<?php

namespace Database\Seeders;

use App\Models\Core;
use App\Models\CPU;
use App\Models\Location;
use App\Models\Memory;
use App\Models\OperatingSystem;
use App\Models\Server;
use App\Models\Service;
use App\Models\Version;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                1, 1, 2, 5, 5, 11, 1, 12, 617520, 2,
            ],
            [
                2, 6, 1, 2, 2, 7, 8, 5, 351900, 2, 
            ],
            [
                1, 1, 1, 3, 6, 14, 25, 12, 1230576, 3
            ],
            [
                4, 27, 2, 6, 5, 13, 13, 6, 564804, 3
            ],
            [
                3, 13, 1, 2, 4, 7, 7, 2, 149574, 2
            ],
            [
                5, 33, 1, 2, 3, 8, 7, 2, 134054, 2
            ],
            [
                6, 42, 2, 5, 3, 9, 7, 2, 154185, 3
            ],
            [
                2, 12, 2, 5, 2, 8, 8, 3, 302400, 3
            ],
            [
                1, 1, 1, 2, 1, 7, 1, 2, 72000, 2
            ],
            [
                5, 33, 2, 5, 4, 11, 2, 2, 118534, 3 
            ]
        ];

        $faker = Faker::create();
        foreach ($services as $s) {
            $createdAt = $faker->dateTimeBetween('2023-06-06 00:00:00', '2023-07-06 00:00:00');
            $lastLogin = $faker->dateTimeBetween('2023-06-10 00:00:00', '2023-06-20 00:00:00');
            $expiredAt = Carbon::parse($createdAt)->addMonth($s[7]);

            $service = Service::create([
                'vps_os' => $s[0],
                'vps_version' => $s[1],
                'vps_cpu' => $s[2],
                'vps_core' => $s[3],
                'vps_ram' => $s[4],
                'vps_rom' => $s[5],
                'vps_server' => $s[6],
                'vps_total_price' => $s[8],
                'account_fk' => $s[9],
                'created_at' => $createdAt->format('Y-m-d H:i:s'),
                'expired_at' => $expiredAt->format('Y-m-d H:i:s'),
                'last_login' => $lastLogin->format('Y-m-d H:i:s'),
            ]);

            // Update vps_name for the created service
            // $services = Service::with(['accounts', 'operating_systems', 'versions', 'cpus', 'cores', 'rams', 'roms', 'servers.locations', 'servers.bandwidths', 'versions'])->find($service->id);
            $services = Service::with(['versions.operating_systems', 'versions', 'cores.cpus', 'cores', 'rams', 'roms', 'servers.locations', 'servers.bandwidths', 'accounts'])->find($service->id);
            $name = $services->versions->operating_systems->name;
            $releases = $services->versions->releases;
            $cpu = $services->cores->cpus->cpu_name;
            $core = $services->cores->core_qty;
            $ram = $services->rams->memory_size;
            $rom = $services->roms->memory_size;
            // $server = Server::with(['locations', 'bandwidths'])->find($service->vps_server);
            $loc_label = $services->servers->locations->label;
            $bdw_value = $services->servers->bandwidths->value;

            $lower = strtolower(str_replace(' ', '_', $name)) . "_" . strtolower(str_replace(' ', '_', $releases)) . "_x86_64_" . strtolower(str_replace(' ', '_', $cpu)) . "_" . strtolower(str_replace(' ', '_', $core)) . "vcpu_" . strtolower(str_replace(' ', '_', $ram)) . "_" . strtolower(str_replace(' ', '_', $rom)) . "_" . strtolower(str_replace(' ', '_', $loc_label)) . "_" . strtolower(str_replace(' ', '_', $bdw_value)) . "_vps_id_" . "$service->id";

            $service->vps_name = $lower; // Replace 'New VPS Name' with the desired value
            $service->save();
        }

    }
}
