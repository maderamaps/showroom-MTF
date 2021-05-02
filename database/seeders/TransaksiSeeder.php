<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
            $Transaksi[] = [
                'id_user' => "24",
                'no_transaksi' => rand(1000000,9999999),
                'status' => 'confirmed',
                'nominal' => rand(1000000,9999999),
                'created_at' => '2021-'.rand(01,12).'-'.rand(01,30).' 15:04:53',
            ];
        }

        foreach ($Transaksi as $Transaksi) {
            Transaksi::insert($Transaksi);
        }
    }
}
