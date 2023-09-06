<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RekeningGiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rekening_gifts')->insert([
            'nama' => 'Nanda',
            'bank' => 'BCA',
            'no_rekening' => '788239395719',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);
        DB::table('rekening_gifts')->insert([
            'nama' => 'Aisyah',
            'bank' => 'CIMB',
            'no_rekening' => '321762374672',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);
        //
    }
}
