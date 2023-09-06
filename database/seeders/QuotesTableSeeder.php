<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quotes')->insert([
            'sumber' => "QS. Ar- Rum 21",
            'kalimat' => "Dan di antara tanda-tanda kekuasaan Allah ialah diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri supaya kamu merasa tentram di samping-Nya dan dijadikan-Nya rasa kasih sayang di antara kamu. Sesungguhnya yang demikian itu menjadi bukti kekuasaan Allah bagi kaum yang berfikir.",
            'created_at' => now(),
            'updated_at' => now(),
            'undangan_id' => 1
        ]);
        //
    }
}
