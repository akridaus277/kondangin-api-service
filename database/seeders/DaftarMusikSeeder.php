<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaftarMusikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daftar_musiks')->insert([
            'title' => "You're Still The One (Shania Twain Cover)",
            'artist' => 'Teddy Swims',
            'url' => '/assets/music/galeri-musik/03.mp3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('daftar_musiks')->insert([
            'title' => "Beautiful In White",
            'artist' => 'Shane Filan',
            'url' => '/assets/music/galeri-musik/04.mp3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('daftar_musiks')->insert([
            'title' => "Marry Your Daughter",
            'artist' => 'Brian McKnight',
            'url' => '/assets/music/galeri-musik/07.mp3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('daftar_musiks')->insert([
            'title' => "I Wanna Grow Old With You",
            'artist' => 'Westlife',
            'url' => '/assets/music/galeri-musik/10.mp3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('daftar_musiks')->insert([
            'title' => "A Thousand Years (Piano Cello Cover)",
            'artist' => 'Christina Perri',
            'url' => '/assets/music/galeri-musik/12.mp3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('daftar_musiks')->insert([
            'title' => "Endless Love Saxophone Cover",
            'artist' => 'Samuel Tago',
            'url' => '/assets/music/galeri-musik/13.mp3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('daftar_musiks')->insert([
            'title' => "It's You",
            'artist' => 'Sezairi',
            'url' => '/assets/music/galeri-musik/14.mp3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('daftar_musiks')->insert([
            'title' => "Akad",
            'artist' => 'Payung Teduh',
            'url' => '/assets/music/galeri-musik/15.mp3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('daftar_musiks')->insert([
            'title' => "Perfect",
            'artist' => 'Ed Sheeran',
            'url' => '/assets/music/galeri-musik/16.mp3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('daftar_musiks')->insert([
            'title' => "Marry Your Daughter (Saxophone)",
            'artist' => 'Brian Mcknight',
            'url' => '/assets/music/galeri-musik/17.mp3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        
        //
    }
}
