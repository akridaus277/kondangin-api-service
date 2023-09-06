<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->insert([
            'url' => 'https://www.youtube.com/watch?v=H2StEYDVlc8',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);
        //
    }
}
