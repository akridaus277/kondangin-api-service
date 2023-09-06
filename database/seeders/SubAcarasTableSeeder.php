<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubAcarasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_acaras')->insert([
            'nama' => 'Akad Nikah',
            'start_time' => Carbon::create(2023, 8, 15, 8, 0, 0),
            'end_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
            'tempat' => 'Masjid Al-Hikmah - Graha CIMB Niaga',
            'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
            'lattitude' => -6.2733044,
            'longitude' => 106.7152007,
            'main_event' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);
        DB::table('sub_acaras')->insert([
            'nama' => 'Resepsi',
            'start_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
            'end_time' => Carbon::create(2023, 8, 15, 16, 0, 0),
            'tempat' => 'Lobby - Griya CIMB Niaga',
            'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
            'lattitude' => -6.2732298,
            'longitude' => 106.723991,
            'main_event' => false,
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);
        //
    }
}
