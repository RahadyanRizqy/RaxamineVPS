<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = [
            [1, 1],
            [1, 2],
            [1, 3],
            [1, 4],
            [1, 5],
            [1, 6],
            [1, 7],
            [1, 8],
            [0, 9],
            [0, 10],
        ];

        for ($i = 0; $i < count($transactions); $i++) {
            Transaction::create([
                'status' => $transactions[$i][0],
                'ordered_vps_id' => $transactions[$i][1],
            ]);
        }
    }
}
