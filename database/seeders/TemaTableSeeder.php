<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('temas')->insert([
            'nama' => 'Bronze Satu',
            'cover' => '/assets/img/galeri-foto/bronze-1-cover.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('temas')->insert([
            'nama' => 'Bronze Dua',
            'cover' => '/assets/img/galeri-foto/bronze-2-cover.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('temas')->insert([
            'nama' => 'Bronze Tiga',
            'cover' => '/assets/img/galeri-foto/bronze-3-cover.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('temas')->insert([
            'nama' => 'Silver Satu',
            'cover' => '/assets/img/galeri-foto/silver-1-cover.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('temas')->insert([
            'nama' => 'Silver Dua',
            'cover' => '/assets/img/galeri-foto/silver-2-cover.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('temas')->insert([
            'nama' => 'Silver Tiga',
            'cover' => '/assets/img/galeri-foto/silver-3-cover.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('temas')->insert([
            'nama' => 'Gold Satu',
            'cover' => '/assets/img/galeri-foto/gold-1-cover.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('temas')->insert([
            'nama' => 'Gold Dua',
            'cover' => '/assets/img/galeri-foto/gold-2-cover.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('temas')->insert([
            'nama' => 'Gold Tiga',
            'cover' => '/assets/img/galeri-foto/gold-3-cover.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //
    }
}
