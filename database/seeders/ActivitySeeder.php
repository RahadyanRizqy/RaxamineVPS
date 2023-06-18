<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = 
        [
            [
                'Telah memesan VPS ID 1 dengan INVOICE ID 0001', 2
            ],
            [
                'Pesanan VPS ID 1 dengan INVOICE ID 0001 disetujui', 2
            ],
            [
                'Telah memesan VPS ID 9 dengan INVOICE ID 0002', 2
            ],
            [
                'Pesanan VPS ID 9 dengan INVOICE ID 0002 ditolak (stok habis)', 2
            ],
            
            [
                'Telah memesan VPS ID 10 dengan INVOICE ID 0003', 3
            ],
            [
                'Pesanan VPS ID 3 dengan INVOICE ID 0003 disetujui', 3
            ],
            [
                'Telah memesan VPS ID 4 dengan INVOICE ID 0004', 3
            ],
            [
                'Pesanan VPS ID 4 dengan INVOICE ID 0004 ditolak (stok habis)', 3
            ],
        ];

        for ($i = 0; $i < count($activities); $i++) {
            Activity::create([
                'detail' => $activities[$i][0],
                'account_fk' => $activities[$i][1],
            ]);
        }
    }
}
