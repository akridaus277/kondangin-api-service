<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Paket_TemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paket_tema')->insert([
            'paket_id' => 1,
            'tema_id' => 1,
        ]);
        DB::table('paket_tema')->insert([
            'paket_id' => 1,
            'tema_id' => 2,
        ]);
        DB::table('paket_tema')->insert([
            'paket_id' => 1,
            'tema_id' => 3,
        ]);
        DB::table('paket_tema')->insert([
            'paket_id' => 2,
            'tema_id' => 4,
        ]);
        DB::table('paket_tema')->insert([
            'paket_id' => 2,
            'tema_id' => 5,
        ]);
        DB::table('paket_tema')->insert([
            'paket_id' => 2,
            'tema_id' => 6,
        ]);
        DB::table('paket_tema')->insert([
            'paket_id' => 3,
            'tema_id' => 7,
        ]);
        DB::table('paket_tema')->insert([
            'paket_id' => 3,
            'tema_id' => 8,
        ]);

        //
    }
}
