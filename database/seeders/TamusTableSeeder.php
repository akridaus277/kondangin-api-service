<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TamusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tamus=array("Akri","Dhimas","Faishal","Sonya");
        foreach ($tamus as $key => $tamu) {
            DB::table('tamus')->insert([
                'nama' => $tamu,
                'created_at' => now(),
                'updated_at' => now(),
                'undangan_id' => 1
            ]);
        }
        
        //
    }
}
