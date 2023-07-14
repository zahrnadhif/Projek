<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RejectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rejects')->insert([
            'reject' => 'Kulit Jeruk',
            'keterangan' => 'loremkkejbfewhfhuew',
            'penyebab' => 'dehdukhewudhwiuh',
            'solusi' => 'jewjduewhuhwhc',
            'gambar'=> 'jdiwdhcuhdsugc'
        ]);
    }
}
