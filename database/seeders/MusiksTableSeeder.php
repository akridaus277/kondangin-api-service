<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusiksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('musiks')->insert([
            'url' => 'https://soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3',
            'nama' => 'T. Schürger - SoundHelix Song 1',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);
        //
    }
}
