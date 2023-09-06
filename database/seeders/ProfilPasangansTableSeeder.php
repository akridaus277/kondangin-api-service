<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilPasangansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profil_pasangans')->insert([
            'nama' => 'Nanda',
            'nama_panggilan' => 'Nanda',
            'nama_bapak' => 'Bapaknya Nanda',
            'nama_ibu' => 'Ibunya Nanda',
            'kelamin' => 'Pria',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);

        DB::table('profil_pasangans')->insert([
            'nama' => 'Aisyah',
            'nama_panggilan' => 'Aisyah',
            'nama_bapak' => 'Bapaknya Aisyah',
            'nama_ibu' => 'Ibunya Aisyah',
            'kelamin' => 'Wanita',
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);
        //
    }
}
