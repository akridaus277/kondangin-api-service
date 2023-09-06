<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fotos')->insert([
            'url' => 'https://ngantenstory.com/wp-content/uploads/2022/12/d2-10.jpg',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);
        DB::table('fotos')->insert([
            'url' => 'https://ngantenstory.com/wp-content/uploads/2022/12/d2-11.jpg',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);
        DB::table('fotos')->insert([
            'url' => 'https://ngantenstory.com/wp-content/uploads/2022/12/d2-5.jpg',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);
        DB::table('fotos')->insert([
            'url' => 'https://ngantenstory.com/wp-content/uploads/2022/12/d2-3.jpg',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);
        //
    }
}
