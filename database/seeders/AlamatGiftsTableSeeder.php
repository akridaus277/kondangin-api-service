<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlamatGiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('alamat_gifts')->insert([
            'nama' => 'Nanda',
            'no_hp' => '085992893045',
            'alamat' => 'Kost Nur Hidayah',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);
        DB::table('alamat_gifts')->insert([
            'nama' => 'Aisyah',
            'no_hp' => '083683647812',
            'alamat' => 'Kost nya Aisyah',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);
        //
    }
}
