<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pakets')->insert([
            'nama' => 'Paket Bronze',
            'harga' => 99000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('pakets')->insert([
            'nama' => 'Paket Silver',
            'harga' => 125000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('pakets')->insert([
            'nama' => 'Paket Gold',
            'harga' => 199000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //
    }
}
