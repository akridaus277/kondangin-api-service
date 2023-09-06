<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UcapansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ucapans')->insert([
            'nama' => "Akri",
            'kalimat' => "Selamat babang tamvan, semoga lancar sampai hari H, dan dijadikan keluarga yang samawa. Tetap metal!!! Huwatciyaaah!!!",
            'konfirmasi' => 'Tidak Hadir',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1,
            'tamu_id' => 1
        ]);
        DB::table('ucapans')->insert([
            'nama' => "Dhimas",
            'kalimat' => "Selamat babang Aan & Istri.. semoga lancar acara-nya",
            'konfirmasi' => 'Hadir',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1,
            'tamu_id' => 2
        ]);
        DB::table('ucapans')->insert([
            'nama' => "Faishal",
            'kalimat' => "Alhamdulillah, semoga dilancarkan semuanya, diberikan keberkahan selalu untuk Aan dan Calon istri 🤲🏼",
            'konfirmasi' => 'Belum Pasti',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1,
            'tamu_id' => 3
        ]);
        //
    }
}
