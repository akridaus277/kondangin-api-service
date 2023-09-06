<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Akri',
            'email' => 'akri@kondangin.com',
            'password' => Hash::make('Kondangin1!'),
            'no_hp' => '089679048560',
            'alamat' => 'Pondok ranji',
            'kota' => 'Tangerang Selatan',
            'provinsi' => 'Banten',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Dhimas',
            'email' => 'dhimas@kondangin.com',
            'password' => Hash::make('Kondangin1!'),
            'no_hp' => '085326413810',
            'alamat' => 'Karawaci',
            'kota' => 'Tangerang Selatan',
            'provinsi' => 'Banten',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 1

        ]);
        DB::table('users')->insert([
            'name' => 'Nanda',
            'email' => 'nadna@gmail.com',
            'password' => Hash::make('Kondangin1!'),
            'no_hp' => '085234223452',
            'alamat' => 'Bekasi',
            'kota' => 'Bekasi',
            'provinsi' => 'Jawa Barat',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 2

        ]);
        //
    }
}
