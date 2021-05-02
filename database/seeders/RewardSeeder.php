<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reward;


class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
            $Reward[] = [
                'id_transaksi' => rand(56,75),
                'nominal' => rand(10000,100000),
                'status' => 'reward',
                'created_at' => '2021-'.rand(01,12).'-'.rand(01,30).' 15:04:53',
            ];
        }

        foreach ($Reward as $Reward) {
            Reward::insert($Reward);
        }
    }
}
