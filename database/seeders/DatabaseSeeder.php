<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Tenant;
use App\Models\Tamu;
use App\Models\ProfilPasangan;
use App\Models\AlamatGift;
use App\Models\RekeningGift;
use App\Models\SubAcara;
use App\Models\Musik;
use App\Models\Quote;
use App\Models\Ucapan;
use App\Models\Foto;
use App\Models\FotoBackground;
use App\Models\Video;

function randomNumberSequence($requiredLength = 7, $highestDigit = 8) {
    $sequence = '';
    for ($i = 0; $i < $requiredLength; ++$i) {
        $sequence .= mt_rand(0, $highestDigit);
    }
    return $sequence;
}



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    

    public function run()
    {
        
        
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TemaTableSeeder::class);
        $this->call(PaketTableSeeder::class);
        $this->call(Paket_TemaTableSeeder::class);
        $this->call(DaftarMusikSeeder::class);

        $tenant1 = Tenant::create([
            'tenant_code' => 'bronzesatu',
            'tema_id' => 1,
            'paket_id' => 1,
            'user_id' => 2,
            'active' => true,
            'tenancy_db_username' => 'kond8002_root',
            'tenancy_db_password' => '',
        ]);
        $tenant2 = Tenant::create([
            'tenant_code' => 'bronzedua',
            'tema_id' => 2,
            'paket_id' => 1,
            'user_id' => 2,
            'active' => false,
            'tenancy_db_username' => 'kond8002_root',
            'tenancy_db_password' => '',
        ]);
        $tenant3 = Tenant::create([
            'tenant_code' => 'bronzetiga',
            'tema_id' => 3,
            'paket_id' => 1,
            'user_id' => 2,
            'active' => false,
            'tenancy_db_username' => 'kond8002_root',
            'tenancy_db_password' => '',
        ]);
        $tenant4 = Tenant::create([
            'tenant_code' => 'silversatu',
            'tema_id' => 4,
            'paket_id' => 2,
            'user_id' => 2,
            'active' => true,
            'tenancy_db_username' => 'kond8002_root',
            'tenancy_db_password' => '',
        ]);
        $tenant5 = Tenant::create([
            'tenant_code' => 'silverdua',
            'tema_id' => 5,
            'paket_id' => 2,
            'user_id' => 2,
            'active' => false,
            'tenancy_db_username' => 'kond8002_root',
            'tenancy_db_password' => '',
        ]);
        $tenant6 = Tenant::create([
            'tenant_code' => 'silvertiga',
            'tema_id' => 6,
            'paket_id' => 2,
            'user_id' => 2,
            'active' => false,
            'tenancy_db_username' => 'kond8002_root',
            'tenancy_db_password' => '',
        ]);
        $tenant7 = Tenant::create([
            'tenant_code' => 'goldsatu',
            'tema_id' => 7,
            'paket_id' => 3,
            'user_id' => 2,
            'active' => true,
            'tenancy_db_username' => 'kond8002_root',
            'tenancy_db_password' => '',
        ]);
        $tenant8 = Tenant::create([
            'tenant_code' => 'golddua',
            'tema_id' => 8,
            'paket_id' => 3,
            'user_id' => 2,
            'active' => false,
            'tenancy_db_username' => 'kond8002_root',
            'tenancy_db_password' => '',
        ]);
        $tenant9 = Tenant::create([
            'tenant_code' => 'goldtiga',
            'tema_id' => 9,
            'paket_id' => 3,
            'user_id' => 2,
            'active' => false,
            'tenancy_db_username' => 'kond8002_root',
            'tenancy_db_password' => '',
        ]);

        $tenant1->domains()->create(['domain' => 'bronzesatu']);
        $tenant2->domains()->create(['domain' => 'bronzedua']);
        $tenant3->domains()->create(['domain' => 'bronzetiga']);
        $tenant4->domains()->create(['domain' => 'silversatu']);
        $tenant5->domains()->create(['domain' => 'silverdua']);
        $tenant6->domains()->create(['domain' => 'silvertiga']);
        $tenant7->domains()->create(['domain' => 'goldsatu']);
        $tenant8->domains()->create(['domain' => 'golddua']);
        $tenant9->domains()->create(['domain' => 'goldtiga']);

        // //$this->call(TenantsTableSeeder::class);
        $tenant1->run(function () {
            ProfilPasangan::create([
                'nama' => 'Darmana Pradana',
                'nama_panggilan' => 'Darmana',
                'nama_bapak' => 'Jamal Hutasoit',
                'nama_ibu' => 'Uchita Laksita',
                'kelamin' => 'Pria',
                'url_foto' => '/assets/img/galeri-foto/bronze-1-preview-profile-1.png'
            ]);
            ProfilPasangan::create([
                'nama' => 'Carla Yulianti',
                'nama_panggilan' => 'Carla',
                'nama_bapak' => 'Cawisono Situmorang',
                'nama_ibu' => 'Tari Fujiati',
                'kelamin' => 'Wanita',
                'url_foto' => '/assets/img/galeri-foto/bronze-1-preview-profile-2.png'
            ]);
            AlamatGift::create([
                'nama' => 'Darmana Pradana',
                'no_hp' => '085992893045',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            AlamatGift::create([
                'nama' => 'Carla Yulianti',
                'no_hp' => '083683647812',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            RekeningGift::create([
                'nama' => 'Darmana Pradana',
                'bank' => 'BCA',
                'no_rekening' => '788239395719',
                'logo' => '/assets/img/bank/bca.png'
            ]);
            RekeningGift::create([
                'nama' => 'Carla Yulianti',
                'bank' => 'CIMB',
                'no_rekening' => '321762374672',
                'logo' => '/assets/img/bank/cimb.png'
            ]);
            SubAcara::create([
                'nama' => 'Akad Nikah',
                'start_time' => Carbon::create(2023, 8, 15, 8, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Masjid Al Ikhlas KTP',
                'alamat' => 'Komplek, Jl. Karang Tengah Permai Arjuna, RT.002/RW.014, Karang Tim., Kec. Karang Tengah, Kota Tangerang, Banten 15157',
                'link_map' => 'https://goo.gl/maps/nHpzDT6Gw6XCXY9r5',
                'main_event' => true,
            ]);
            SubAcara::create([
                'nama' => 'Resepsi',
                'start_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 16, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Balai Ratu Permai',
                'alamat' => 'Jl. Tegal Rotan Raya No.11, Sawah Baru, Kec. Ciputat, Kota Tangerang Selatan, Banten 15412',
                'link_map' => 'https://goo.gl/maps/wK5Lprm3HSQPvo82A',
                'main_event' => false,
            ]);
            Musik::create([
                'url' => '/assets/music/galeri-musik/03.mp3',
                'title' => "You're Still The One (Shania Twain Cover)",
                'artist' => 'Teddy Swims'
            ]);
            $tamus=array("Akri","Dhimas","Faishal","Sonya");
            $numberPrefixes = ['62863', '62832', '62878', '62888', '62889', '62808', '62804', '62805', '62806', '62867'];
            $randomUcapan=[
                "Selamat menikah, sahabatku tersayang. Semoga kalian menjadi pasangan sejati sampai maut memisahkan, lekas dikaruniai keturunan yang saleh dan salehah. Aamiin. 😘😘",
                "❤️ Cinta merupakan anugerah terbaik yang diberikan Tuhan.🥰 Cinta juga merupakan penghargaan besar bagi mereka yang menerima. Selamat menikah, jagalah anugerah tersebut dengan baik. ❤️",
                "Kunci membangun hubungan pernikahan yang kuat dan harmonis adalah saling teguh memegang komitmen bersama. Selamat menikah, semoga menjadi pasangan yang abadi. 🥰🥰🥰",
                "❤️ Tetanggaku yang sudah jadi teman bermain dari kecil, selamat menikah! Semoga bahagia dan dilancarkan rezekinya selalu. Jangan lupakan teman kecilmu ini, ya! ❤️"
            ];
            Tamu::create([
                'nama' => 'Tony',
                'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
            ]);
            foreach ($tamus as $key => $tamu) {
                $tamuObbject = Tamu::create([
                    'nama' => $tamu,
                    'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
                ]);
                
                Ucapan::create([
                    'nama' => $tamuObbject->nama,
                    'kalimat' => $randomUcapan[$key],
                    'konfirmasi' => 'Hadir',
                    'tamu_id' => $tamuObbject->id
                ]);
            }
            Quote::create([
                'sumber' => "QS. Ar- Rum 21",
                'kalimat' => "Dan di antara tanda-tanda kekuasaan Allah ialah diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri supaya kamu merasa tentram di samping-Nya dan dijadikan-Nya rasa kasih sayang di antara kamu. Sesungguhnya yang demikian itu menjadi bukti kekuasaan Allah bagi kaum yang berfikir.",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-1-preview-foto-1.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-1-preview-foto-2.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-1-preview-foto-3.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-1-preview-foto-4.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-1-preview-foto-5.jpg",
            ]);
            // Foto::create([
            //     'url' => "/assets/img/galeri-foto/bronze-1-preview-foto-6.jpg",
            // ]);
            // Foto::create([
            //     'url' => "/assets/img/galeri-foto/bronze-1-preview-foto-7.jpg",
            // ]);
            
            Video::create([
                'url' => 'https://www.youtube.com/embed/ccLnI3qJL4w?feature=oembed',
                'video_id' => 'ccLnI3qJL4w'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-1-preview-bg-1.jpg",
                'flag' => 'Background-1'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-1-preview-bg-2.jpg",
                'flag' => 'Background-2'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-1-preview-bg-3.jpg",
                'flag' => 'Background-3'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-1-preview-bg-4.jpg",
                'flag' => 'Background-4'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-1-preview-bg-5.jpg",
                'flag' => 'Background-5'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-1-preview-bg-6.jpg",
                'flag' => 'Background-6'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-1-preview-bg-7.jpg",
                'flag' => 'Background-7'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-1-preview-bg-8.jpg",
                'flag' => 'Background-8'
            ]);

        });
        $tenant2->run(function () {
            ProfilPasangan::create([
                'nama' => 'Reynard Yusdwindra',
                'nama_panggilan' => 'Reynard',
                'nama_bapak' => 'Wildan Julianto',
                'nama_ibu' => 'Gishella Hayati',
                'kelamin' => 'Pria',
                'url_foto' => '/assets/img/galeri-foto/bronze-2-preview-profile-1.png'
            ]);
            ProfilPasangan::create([
                'nama' => 'Yasmine Irene Alim',
                'nama_panggilan' => 'Yasmine',
                'nama_bapak' => 'Sumandi Gorat',
                'nama_ibu' => 'Sabrina Aurealia',
                'kelamin' => 'Wanita',
                'url_foto' => '/assets/img/galeri-foto/bronze-2-preview-profile-2.png'
            ]);
            AlamatGift::create([
                'nama' => 'Reynard Yusdwindra',
                'no_hp' => '085992893045',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            AlamatGift::create([
                'nama' => 'Yasmine Irene Alim',
                'no_hp' => '083683647812',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            RekeningGift::create([
                'nama' => 'Reynard Yusdwindra',
                'bank' => 'BCA',
                'no_rekening' => '788239395719',
                'logo' => '/assets/img/bank/bca.png'
            ]);
            RekeningGift::create([
                'nama' => 'Yasmine Irene Alim',
                'bank' => 'CIMB',
                'no_rekening' => '321762374672',
                'logo' => '/assets/img/bank/cimb.png'
            ]);
            SubAcara::create([
                'nama' => 'Akad Nikah',
                'start_time' => Carbon::create(2023, 8, 15, 8, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Masjid Al Ikhlas KTP',
                'alamat' => 'Komplek, Jl. Karang Tengah Permai Arjuna, RT.002/RW.014, Karang Tim., Kec. Karang Tengah, Kota Tangerang, Banten 15157',
                'link_map' => 'https://goo.gl/maps/nHpzDT6Gw6XCXY9r5',
                'main_event' => true,
            ]);
            SubAcara::create([
                'nama' => 'Resepsi',
                'start_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 16, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Balai Ratu Permai',
                'alamat' => 'Jl. Tegal Rotan Raya No.11, Sawah Baru, Kec. Ciputat, Kota Tangerang Selatan, Banten 15412',
                'link_map' => 'https://goo.gl/maps/wK5Lprm3HSQPvo82A',
                'main_event' => false,
            ]);
            Musik::create([
                'url' => '/assets/music/galeri-musik/03.mp3',
                'title' => "You're Still The One (Shania Twain Cover)",
                'artist' => 'Teddy Swims'
            ]);
            $tamus=array("Akri","Dhimas","Faishal","Sonya");
            $numberPrefixes = ['62863', '62832', '62878', '62888', '62889', '62808', '62804', '62805', '62806', '62867'];
            $randomUcapan=[
                "Selamat menikah, sahabatku tersayang. Semoga kalian menjadi pasangan sejati sampai maut memisahkan, lekas dikaruniai keturunan yang saleh dan salehah. Aamiin. 😘😘",
                "❤️ Cinta merupakan anugerah terbaik yang diberikan Tuhan.🥰 Cinta juga merupakan penghargaan besar bagi mereka yang menerima. Selamat menikah, jagalah anugerah tersebut dengan baik. ❤️",
                "Kunci membangun hubungan pernikahan yang kuat dan harmonis adalah saling teguh memegang komitmen bersama. Selamat menikah, semoga menjadi pasangan yang abadi. 🥰🥰🥰",
                "❤️ Tetanggaku yang sudah jadi teman bermain dari kecil, selamat menikah! Semoga bahagia dan dilancarkan rezekinya selalu. Jangan lupakan teman kecilmu ini, ya! ❤️"
            ];
            Tamu::create([
                'nama' => 'Tony',
                'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
            ]);
            foreach ($tamus as $key => $tamu) {
                $tamuObbject = Tamu::create([
                    'nama' => $tamu,
                    'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
                ]);
                
                Ucapan::create([
                    'nama' => $tamuObbject->nama,
                    'kalimat' => $randomUcapan[$key],
                    'konfirmasi' => 'Hadir',
                    'tamu_id' => $tamuObbject->id
                ]);
            }
            Quote::create([
                'sumber' => "QS. Ar- Rum 21",
                'kalimat' => "Dan di antara tanda-tanda kekuasaan Allah ialah diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri supaya kamu merasa tentram di samping-Nya dan dijadikan-Nya rasa kasih sayang di antara kamu. Sesungguhnya yang demikian itu menjadi bukti kekuasaan Allah bagi kaum yang berfikir.",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-2-preview-foto-1.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-2-preview-foto-2.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-2-preview-foto-3.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-2-preview-foto-4.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-2-preview-foto-5.jpg",
            ]);
            // Foto::create([
            //     'url' => "/assets/img/galeri-foto/bronze-2-preview-foto-6.jpg",
            // ]);
            // Foto::create([
            //     'url' => "/assets/img/galeri-foto/bronze-2-preview-foto-7.jpg",
            // ]);
            
            Video::create([
                'url' => 'https://www.youtube.com/embed/ccLnI3qJL4w?feature=oembed',
                'video_id' => 'ccLnI3qJL4w'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-2-preview-bg-1.jpg",
                'flag' => 'Background-1'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-2-preview-bg-2.jpg",
                'flag' => 'Background-2'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-2-preview-bg-3.jpg",
                'flag' => 'Background-3'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-2-preview-bg-4.jpg",
                'flag' => 'Background-4'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-2-preview-bg-5.jpg",
                'flag' => 'Background-5'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-2-preview-bg-6.jpg",
                'flag' => 'Background-6'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-2-preview-bg-7.jpg",
                'flag' => 'Background-7'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-2-preview-bg-8.jpg",
                'flag' => 'Background-8'
            ]);

        });
        $tenant3->run(function () {
            ProfilPasangan::create([
                'nama' => 'Hizrian Romario',
                'nama_panggilan' => 'Hizrian',
                'nama_bapak' => 'Sujendro Hasudungan',
                'nama_ibu' => 'Shabrina Palupi',
                'kelamin' => 'Pria',
                'url_foto' => '/assets/img/galeri-foto/bronze-3-preview-profile-1.png'
            ]);
            ProfilPasangan::create([
                'nama' => 'Liandra Rumanti',
                'nama_panggilan' => 'Liandra',
                'nama_bapak' => 'Rifat Al-fathan',
                'nama_ibu' => 'Irene Rudiatin',
                'kelamin' => 'Wanita',
                'url_foto' => '/assets/img/galeri-foto/bronze-3-preview-profile-2.png'
            ]);
            AlamatGift::create([
                'nama' => 'Hizrian Romario',
                'no_hp' => '085992893045',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            AlamatGift::create([
                'nama' => 'Liandra Rumanti',
                'no_hp' => '083683647812',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            RekeningGift::create([
                'nama' => 'Hizrian Romario',
                'bank' => 'BCA',
                'no_rekening' => '788239395719',
                'logo' => '/assets/img/bank/bca.png'
            ]);
            RekeningGift::create([
                'nama' => 'Liandra Rumanti',
                'bank' => 'CIMB',
                'no_rekening' => '321762374672',
                'logo' => '/assets/img/bank/cimb.png'
            ]);
            SubAcara::create([
                'nama' => 'Akad Nikah',
                'start_time' => Carbon::create(2023, 8, 15, 8, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Masjid Al Ikhlas KTP',
                'alamat' => 'Komplek, Jl. Karang Tengah Permai Arjuna, RT.002/RW.014, Karang Tim., Kec. Karang Tengah, Kota Tangerang, Banten 15157',
                'link_map' => 'https://goo.gl/maps/nHpzDT6Gw6XCXY9r5',
                'main_event' => true,
            ]);
            SubAcara::create([
                'nama' => 'Resepsi',
                'start_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 16, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Balai Ratu Permai',
                'alamat' => 'Jl. Tegal Rotan Raya No.11, Sawah Baru, Kec. Ciputat, Kota Tangerang Selatan, Banten 15412',
                'link_map' => 'https://goo.gl/maps/wK5Lprm3HSQPvo82A',
                'main_event' => false,
            ]);
            Musik::create([
                'url' => '/assets/music/galeri-musik/03.mp3',
                'title' => "You're Still The One (Shania Twain Cover)",
                'artist' => 'Teddy Swims'
            ]);
            $tamus=array("Akri","Dhimas","Faishal","Sonya");
            $numberPrefixes = ['62863', '62832', '62878', '62888', '62889', '62808', '62804', '62805', '62806', '62867'];
            $randomUcapan=[
                "Selamat menikah, sahabatku tersayang. Semoga kalian menjadi pasangan sejati sampai maut memisahkan, lekas dikaruniai keturunan yang saleh dan salehah. Aamiin. 😘😘",
                "❤️ Cinta merupakan anugerah terbaik yang diberikan Tuhan.🥰 Cinta juga merupakan penghargaan besar bagi mereka yang menerima. Selamat menikah, jagalah anugerah tersebut dengan baik. ❤️",
                "Kunci membangun hubungan pernikahan yang kuat dan harmonis adalah saling teguh memegang komitmen bersama. Selamat menikah, semoga menjadi pasangan yang abadi. 🥰🥰🥰",
                "❤️ Tetanggaku yang sudah jadi teman bermain dari kecil, selamat menikah! Semoga bahagia dan dilancarkan rezekinya selalu. Jangan lupakan teman kecilmu ini, ya! ❤️"
            ];
            Tamu::create([
                'nama' => 'Tony',
                'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
            ]);
            foreach ($tamus as $key => $tamu) {
                $tamuObbject = Tamu::create([
                    'nama' => $tamu,
                    'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
                ]);
                
                Ucapan::create([
                    'nama' => $tamuObbject->nama,
                    'kalimat' => $randomUcapan[$key],
                    'konfirmasi' => 'Hadir',
                    'tamu_id' => $tamuObbject->id
                ]);
            }
            Quote::create([
                'sumber' => "QS. Ar- Rum 21",
                'kalimat' => "Dan di antara tanda-tanda kekuasaan Allah ialah diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri supaya kamu merasa tentram di samping-Nya dan dijadikan-Nya rasa kasih sayang di antara kamu. Sesungguhnya yang demikian itu menjadi bukti kekuasaan Allah bagi kaum yang berfikir.",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-3-preview-foto-1.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-3-preview-foto-2.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-3-preview-foto-3.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-3-preview-foto-4.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/bronze-3-preview-foto-5.jpg",
            ]);
            // Foto::create([
            //     'url' => "/assets/img/galeri-foto/bronze-3-preview-foto-6.jpg",
            // ]);
            // Foto::create([
            //     'url' => "/assets/img/galeri-foto/bronze-3-preview-foto-7.jpg",
            // ]);
            
            Video::create([
                'url' => 'https://www.youtube.com/embed/ccLnI3qJL4w?feature=oembed',
                'video_id' => 'ccLnI3qJL4w'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-3-preview-bg-1.jpg",
                'flag' => 'Background-1'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-3-preview-bg-2.jpg",
                'flag' => 'Background-2'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-3-preview-bg-3.jpg",
                'flag' => 'Background-3'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-3-preview-bg-4.jpg",
                'flag' => 'Background-4'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-3-preview-bg-5.jpg",
                'flag' => 'Background-5'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-3-preview-bg-6.jpg",
                'flag' => 'Background-6'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-3-preview-bg-7.jpg",
                'flag' => 'Background-7'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/bronze-3-preview-bg-8.jpg",
                'flag' => 'Background-8'
            ]);

        });
        $tenant4->run(function () {
            ProfilPasangan::create([
                'nama' => 'Andhika Riahdita',
                'nama_panggilan' => 'Andhika',
                'nama_bapak' => 'Aristyo Bayhacki',
                'nama_ibu' => 'Annis Rooswati',
                'kelamin' => 'Pria',
                'url_foto' => '/assets/img/galeri-foto/silver-1-preview-profile-1.png'
            ]);
            ProfilPasangan::create([
                'nama' => 'Lutfia Khairina',
                'nama_panggilan' => 'Lutfia',
                'nama_bapak' => 'Rifqy Octaza',
                'nama_ibu' => 'Eti Rizkia',
                'kelamin' => 'Wanita',
                'url_foto' => '/assets/img/galeri-foto/silver-1-preview-profile-2.png'
            ]);
            AlamatGift::create([
                'nama' => 'Andhika Riahdita',
                'no_hp' => '085992893045',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            AlamatGift::create([
                'nama' => 'Lutfia Khairina',
                'no_hp' => '083683647812',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            RekeningGift::create([
                'nama' => 'Andhika Riahdita',
                'bank' => 'BCA',
                'no_rekening' => '788239395719',
                'logo' => '/assets/img/bank/bca.png'
            ]);
            RekeningGift::create([
                'nama' => 'Lutfia Khairina',
                'bank' => 'CIMB',
                'no_rekening' => '321762374672',
                'logo' => '/assets/img/bank/cimb.png'
            ]);
            SubAcara::create([
                'nama' => 'Akad Nikah',
                'start_time' => Carbon::create(2023, 8, 15, 8, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Masjid Al Ikhlas KTP',
                'alamat' => 'Komplek, Jl. Karang Tengah Permai Arjuna, RT.002/RW.014, Karang Tim., Kec. Karang Tengah, Kota Tangerang, Banten 15157',
                'link_map' => 'https://goo.gl/maps/nHpzDT6Gw6XCXY9r5',
                'main_event' => true,
            ]);
            SubAcara::create([
                'nama' => 'Resepsi',
                'start_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 16, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Balai Ratu Permai',
                'alamat' => 'Jl. Tegal Rotan Raya No.11, Sawah Baru, Kec. Ciputat, Kota Tangerang Selatan, Banten 15412',
                'link_map' => 'https://goo.gl/maps/wK5Lprm3HSQPvo82A',
                'main_event' => false,
            ]);
            Musik::create([
                'url' => '/assets/music/galeri-musik/03.mp3',
                'title' => "You're Still The One (Shania Twain Cover)",
                'artist' => 'Teddy Swims'
            ]);
            $tamus=array("Akri","Dhimas","Faishal","Sonya");
            $numberPrefixes = ['62863', '62832', '62878', '62888', '62889', '62808', '62804', '62805', '62806', '62867'];
            $randomUcapan=[
                "Selamat menikah, sahabatku tersayang. Semoga kalian menjadi pasangan sejati sampai maut memisahkan, lekas dikaruniai keturunan yang saleh dan salehah. Aamiin. 😘😘",
                "❤️ Cinta merupakan anugerah terbaik yang diberikan Tuhan.🥰 Cinta juga merupakan penghargaan besar bagi mereka yang menerima. Selamat menikah, jagalah anugerah tersebut dengan baik. ❤️",
                "Kunci membangun hubungan pernikahan yang kuat dan harmonis adalah saling teguh memegang komitmen bersama. Selamat menikah, semoga menjadi pasangan yang abadi. 🥰🥰🥰",
                "❤️ Tetanggaku yang sudah jadi teman bermain dari kecil, selamat menikah! Semoga bahagia dan dilancarkan rezekinya selalu. Jangan lupakan teman kecilmu ini, ya! ❤️"
            ];
            Tamu::create([
                'nama' => 'Tony',
                'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
            ]);
            foreach ($tamus as $key => $tamu) {
                $tamuObbject = Tamu::create([
                    'nama' => $tamu,
                    'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
                ]);
                
                Ucapan::create([
                    'nama' => $tamuObbject->nama,
                    'kalimat' => $randomUcapan[$key],
                    'konfirmasi' => 'Hadir',
                    'tamu_id' => $tamuObbject->id
                ]);
            }
            Quote::create([
                'sumber' => "QS. Ar- Rum 21",
                'kalimat' => "Dan di antara tanda-tanda kekuasaan Allah ialah diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri supaya kamu merasa tentram di samping-Nya dan dijadikan-Nya rasa kasih sayang di antara kamu. Sesungguhnya yang demikian itu menjadi bukti kekuasaan Allah bagi kaum yang berfikir.",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-foto-1.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-foto-2.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-foto-3.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-foto-4.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-foto-5.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-foto-6.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-foto-7.jpg",
            ]);
            
            Video::create([
                'url' => 'https://www.youtube.com/embed/ccLnI3qJL4w?feature=oembed',
                'video_id' => 'ccLnI3qJL4w'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-bg-1.jpg",
                'flag' => 'Background-1'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-bg-2.jpg",
                'flag' => 'Background-2'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-bg-3.jpg",
                'flag' => 'Background-3'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-bg-4.jpg",
                'flag' => 'Background-4'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-bg-5.jpg",
                'flag' => 'Background-5'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-bg-6.jpg",
                'flag' => 'Background-6'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-bg-7.jpg",
                'flag' => 'Background-7'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-1-preview-bg-8.jpg",
                'flag' => 'Background-8'
            ]);

        });
        $tenant5->run(function () {
            ProfilPasangan::create([
                'nama' => 'Yutama Hadian',
                'nama_panggilan' => 'Yutama',
                'nama_bapak' => 'Richard Jeni',
                'nama_ibu' => 'Mia Zahra Ardhi',
                'kelamin' => 'Pria',
                'url_foto' => '/assets/img/galeri-foto/silver-2-preview-profile-1.png'
            ]);
            ProfilPasangan::create([
                'nama' => 'Lella Ayudyah Izhar',
                'nama_panggilan' => 'Lella',
                'nama_bapak' => 'Teddo Kurniansyah',
                'nama_ibu' => 'Yoan Aswati',
                'kelamin' => 'Wanita',
                'url_foto' => '/assets/img/galeri-foto/silver-2-preview-profile-2.png'
            ]);
            AlamatGift::create([
                'nama' => 'Yutama Hadian',
                'no_hp' => '085992893045',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            AlamatGift::create([
                'nama' => 'Lella Ayudyah Izhar',
                'no_hp' => '083683647812',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            RekeningGift::create([
                'nama' => 'Yutama Hadian',
                'bank' => 'BCA',
                'no_rekening' => '788239395719',
                'logo' => '/assets/img/bank/bca.png'
            ]);
            RekeningGift::create([
                'nama' => 'Lella Ayudyah Izhar',
                'bank' => 'CIMB',
                'no_rekening' => '321762374672',
                'logo' => '/assets/img/bank/cimb.png'
            ]);
            SubAcara::create([
                'nama' => 'Akad Nikah',
                'start_time' => Carbon::create(2023, 8, 15, 8, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Masjid Al Ikhlas KTP',
                'alamat' => 'Komplek, Jl. Karang Tengah Permai Arjuna, RT.002/RW.014, Karang Tim., Kec. Karang Tengah, Kota Tangerang, Banten 15157',
                'link_map' => 'https://goo.gl/maps/nHpzDT6Gw6XCXY9r5',
                'main_event' => true,
            ]);
            SubAcara::create([
                'nama' => 'Resepsi',
                'start_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 16, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Balai Ratu Permai',
                'alamat' => 'Jl. Tegal Rotan Raya No.11, Sawah Baru, Kec. Ciputat, Kota Tangerang Selatan, Banten 15412',
                'link_map' => 'https://goo.gl/maps/wK5Lprm3HSQPvo82A',
                'main_event' => false,
            ]);
            Musik::create([
                'url' => '/assets/music/galeri-musik/03.mp3',
                'title' => "You're Still The One (Shania Twain Cover)",
                'artist' => 'Teddy Swims'
            ]);
            $tamus=array("Akri","Dhimas","Faishal","Sonya");
            $numberPrefixes = ['62863', '62832', '62878', '62888', '62889', '62808', '62804', '62805', '62806', '62867'];
            $randomUcapan=[
                "Selamat menikah, sahabatku tersayang. Semoga kalian menjadi pasangan sejati sampai maut memisahkan, lekas dikaruniai keturunan yang saleh dan salehah. Aamiin. 😘😘",
                "❤️ Cinta merupakan anugerah terbaik yang diberikan Tuhan.🥰 Cinta juga merupakan penghargaan besar bagi mereka yang menerima. Selamat menikah, jagalah anugerah tersebut dengan baik. ❤️",
                "Kunci membangun hubungan pernikahan yang kuat dan harmonis adalah saling teguh memegang komitmen bersama. Selamat menikah, semoga menjadi pasangan yang abadi. 🥰🥰🥰",
                "❤️ Tetanggaku yang sudah jadi teman bermain dari kecil, selamat menikah! Semoga bahagia dan dilancarkan rezekinya selalu. Jangan lupakan teman kecilmu ini, ya! ❤️"
            ];
            Tamu::create([
                'nama' => 'Tony',
                'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
            ]);
            foreach ($tamus as $key => $tamu) {
                $tamuObbject = Tamu::create([
                    'nama' => $tamu,
                    'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
                ]);
                
                Ucapan::create([
                    'nama' => $tamuObbject->nama,
                    'kalimat' => $randomUcapan[$key],
                    'konfirmasi' => 'Hadir',
                    'tamu_id' => $tamuObbject->id
                ]);
            }
            Quote::create([
                'sumber' => "QS. Ar- Rum 21",
                'kalimat' => "Dan di antara tanda-tanda kekuasaan Allah ialah diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri supaya kamu merasa tentram di samping-Nya dan dijadikan-Nya rasa kasih sayang di antara kamu. Sesungguhnya yang demikian itu menjadi bukti kekuasaan Allah bagi kaum yang berfikir.",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-foto-1.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-foto-2.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-foto-3.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-foto-4.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-foto-5.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-foto-6.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-foto-7.jpg",
            ]);
            
            Video::create([
                'url' => 'https://www.youtube.com/embed/ccLnI3qJL4w?feature=oembed',
                'video_id' => 'ccLnI3qJL4w'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-bg-1.jpg",
                'flag' => 'Background-1'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-bg-2.jpg",
                'flag' => 'Background-2'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-bg-3.jpg",
                'flag' => 'Background-3'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-bg-4.jpg",
                'flag' => 'Background-4'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-bg-5.jpg",
                'flag' => 'Background-5'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-bg-6.jpg",
                'flag' => 'Background-6'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-bg-7.jpg",
                'flag' => 'Background-7'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-2-preview-bg-8.jpg",
                'flag' => 'Background-8'
            ]);

        });
        $tenant6->run(function () {
            ProfilPasangan::create([
                'nama' => 'Elvin Ernando',
                'nama_panggilan' => 'Elvin',
                'nama_bapak' => 'Wildan Farahdiba',
                'nama_ibu' => 'Shara Lalo',
                'kelamin' => 'Pria',
                'url_foto' => '/assets/img/galeri-foto/silver-3-preview-profile-1.png'
            ]);
            ProfilPasangan::create([
                'nama' => 'Nindy Rachma',
                'nama_panggilan' => 'Nindy',
                'nama_bapak' => 'Ilyas Revi Tilasnuari',
                'nama_ibu' => 'Artika Kahfi',
                'kelamin' => 'Wanita',
                'url_foto' => '/assets/img/galeri-foto/silver-3-preview-profile-2.png'
            ]);
            AlamatGift::create([
                'nama' => 'Elvin Ernando',
                'no_hp' => '085992893045',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            AlamatGift::create([
                'nama' => 'Nindy Rachma',
                'no_hp' => '083683647812',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            RekeningGift::create([
                'nama' => 'Elvin Ernando',
                'bank' => 'BCA',
                'no_rekening' => '788239395719',
                'logo' => '/assets/img/bank/bca.png'
            ]);
            RekeningGift::create([
                'nama' => 'Nindy Rachma',
                'bank' => 'CIMB',
                'no_rekening' => '321762374672',
                'logo' => '/assets/img/bank/cimb.png'
            ]);
            SubAcara::create([
                'nama' => 'Akad Nikah',
                'start_time' => Carbon::create(2023, 8, 15, 8, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Masjid Al Ikhlas KTP',
                'alamat' => 'Komplek, Jl. Karang Tengah Permai Arjuna, RT.002/RW.014, Karang Tim., Kec. Karang Tengah, Kota Tangerang, Banten 15157',
                'link_map' => 'https://goo.gl/maps/nHpzDT6Gw6XCXY9r5',
                'main_event' => true,
            ]);
            SubAcara::create([
                'nama' => 'Resepsi',
                'start_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 16, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Balai Ratu Permai',
                'alamat' => 'Jl. Tegal Rotan Raya No.11, Sawah Baru, Kec. Ciputat, Kota Tangerang Selatan, Banten 15412',
                'link_map' => 'https://goo.gl/maps/wK5Lprm3HSQPvo82A',
                'main_event' => false,
            ]);
            Musik::create([
                'url' => '/assets/music/galeri-musik/03.mp3',
                'title' => "You're Still The One (Shania Twain Cover)",
                'artist' => 'Teddy Swims'
            ]);
            $tamus=array("Akri","Dhimas","Faishal","Sonya");
            $numberPrefixes = ['62863', '62832', '62878', '62888', '62889', '62808', '62804', '62805', '62806', '62867'];
            $randomUcapan=[
                "Selamat menikah, sahabatku tersayang. Semoga kalian menjadi pasangan sejati sampai maut memisahkan, lekas dikaruniai keturunan yang saleh dan salehah. Aamiin. 😘😘",
                "❤️ Cinta merupakan anugerah terbaik yang diberikan Tuhan.🥰 Cinta juga merupakan penghargaan besar bagi mereka yang menerima. Selamat menikah, jagalah anugerah tersebut dengan baik. ❤️",
                "Kunci membangun hubungan pernikahan yang kuat dan harmonis adalah saling teguh memegang komitmen bersama. Selamat menikah, semoga menjadi pasangan yang abadi. 🥰🥰🥰",
                "❤️ Tetanggaku yang sudah jadi teman bermain dari kecil, selamat menikah! Semoga bahagia dan dilancarkan rezekinya selalu. Jangan lupakan teman kecilmu ini, ya! ❤️"
            ];
            Tamu::create([
                'nama' => 'Tony',
                'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
            ]);
            foreach ($tamus as $key => $tamu) {
                $tamuObbject = Tamu::create([
                    'nama' => $tamu,
                    'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
                ]);
                
                Ucapan::create([
                    'nama' => $tamuObbject->nama,
                    'kalimat' => $randomUcapan[$key],
                    'konfirmasi' => 'Hadir',
                    'tamu_id' => $tamuObbject->id
                ]);
            }
            Quote::create([
                'sumber' => "QS. Ar- Rum 21",
                'kalimat' => "Dan di antara tanda-tanda kekuasaan Allah ialah diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri supaya kamu merasa tentram di samping-Nya dan dijadikan-Nya rasa kasih sayang di antara kamu. Sesungguhnya yang demikian itu menjadi bukti kekuasaan Allah bagi kaum yang berfikir.",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-foto-1.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-foto-2.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-foto-3.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-foto-4.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-foto-5.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-foto-6.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-foto-7.jpg",
            ]);
            
            Video::create([
                'url' => 'https://www.youtube.com/embed/ccLnI3qJL4w?feature=oembed',
                'video_id' => 'ccLnI3qJL4w'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-bg-1.jpg",
                'flag' => 'Background-1'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-bg-2.jpg",
                'flag' => 'Background-2'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-bg-3.jpg",
                'flag' => 'Background-3'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-bg-4.jpg",
                'flag' => 'Background-4'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-bg-5.jpg",
                'flag' => 'Background-5'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-bg-6.jpg",
                'flag' => 'Background-6'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-bg-7.jpg",
                'flag' => 'Background-7'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/silver-3-preview-bg-8.jpg",
                'flag' => 'Background-8'
            ]);

        });
        $tenant7->run(function () {
            ProfilPasangan::create([
                'nama' => 'Sugraha Izhar',
                'nama_panggilan' => 'Sugraha',
                'nama_bapak' => 'Yudha Nugraha',
                'nama_ibu' => 'Diniyah Tanjung',
                'kelamin' => 'Pria',
                'url_foto' => '/assets/img/galeri-foto/gold-1-preview-profile-1.png'
            ]);
            ProfilPasangan::create([
                'nama' => 'Dea Cahyani',
                'nama_panggilan' => 'Dea',
                'nama_bapak' => 'Syahid Sayoga',
                'nama_ibu' => 'Dita Alvianingrum',
                'kelamin' => 'Wanita',
                'url_foto' => '/assets/img/galeri-foto/gold-1-preview-profile-2.png'
            ]);
            AlamatGift::create([
                'nama' => 'Sugraha Izhar',
                'no_hp' => '085992893045',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            AlamatGift::create([
                'nama' => 'Dea Cahyani',
                'no_hp' => '083683647812',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            RekeningGift::create([
                'nama' => 'Sugraha Izhar',
                'bank' => 'BCA',
                'no_rekening' => '788239395719',
                'logo' => '/assets/img/bank/bca.png'
            ]);
            RekeningGift::create([
                'nama' => 'Dea Cahyani',
                'bank' => 'CIMB',
                'no_rekening' => '321762374672',
                'logo' => '/assets/img/bank/cimb.png'
            ]);
            SubAcara::create([
                'nama' => 'Akad Nikah',
                'start_time' => Carbon::create(2023, 8, 15, 8, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Masjid Al Ikhlas KTP',
                'alamat' => 'Komplek, Jl. Karang Tengah Permai Arjuna, RT.002/RW.014, Karang Tim., Kec. Karang Tengah, Kota Tangerang, Banten 15157',
                'link_map' => 'https://goo.gl/maps/nHpzDT6Gw6XCXY9r5',
                'main_event' => true,
            ]);
            SubAcara::create([
                'nama' => 'Resepsi',
                'start_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 16, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Balai Ratu Permai',
                'alamat' => 'Jl. Tegal Rotan Raya No.11, Sawah Baru, Kec. Ciputat, Kota Tangerang Selatan, Banten 15412',
                'link_map' => 'https://goo.gl/maps/wK5Lprm3HSQPvo82A',
                'main_event' => false,
            ]);
            Musik::create([
                'url' => '/assets/music/galeri-musik/03.mp3',
                'title' => "You're Still The One (Shania Twain Cover)",
                'artist' => 'Teddy Swims'
            ]);
            $tamus=array("Akri","Dhimas","Faishal","Sonya");
            $numberPrefixes = ['62863', '62832', '62878', '62888', '62889', '62808', '62804', '62805', '62806', '62867'];
            $randomUcapan=[
                "Selamat menikah, sahabatku tersayang. Semoga kalian menjadi pasangan sejati sampai maut memisahkan, lekas dikaruniai keturunan yang saleh dan salehah. Aamiin. 😘😘",
                "❤️ Cinta merupakan anugerah terbaik yang diberikan Tuhan.🥰 Cinta juga merupakan penghargaan besar bagi mereka yang menerima. Selamat menikah, jagalah anugerah tersebut dengan baik. ❤️",
                "Kunci membangun hubungan pernikahan yang kuat dan harmonis adalah saling teguh memegang komitmen bersama. Selamat menikah, semoga menjadi pasangan yang abadi. 🥰🥰🥰",
                "❤️ Tetanggaku yang sudah jadi teman bermain dari kecil, selamat menikah! Semoga bahagia dan dilancarkan rezekinya selalu. Jangan lupakan teman kecilmu ini, ya! ❤️"
            ];
            Tamu::create([
                'nama' => 'Tony',
                'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
            ]);
            foreach ($tamus as $key => $tamu) {
                $tamuObbject = Tamu::create([
                    'nama' => $tamu,
                    'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
                ]);
                
                Ucapan::create([
                    'nama' => $tamuObbject->nama,
                    'kalimat' => $randomUcapan[$key],
                    'konfirmasi' => 'Hadir',
                    'tamu_id' => $tamuObbject->id
                ]);
            }
            Quote::create([
                'sumber' => "QS. Ar- Rum 21",
                'kalimat' => "Dan di antara tanda-tanda kekuasaan Allah ialah diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri supaya kamu merasa tentram di samping-Nya dan dijadikan-Nya rasa kasih sayang di antara kamu. Sesungguhnya yang demikian itu menjadi bukti kekuasaan Allah bagi kaum yang berfikir.",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-foto-1.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-foto-2.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-foto-3.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-foto-4.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-foto-5.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-foto-6.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-foto-7.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-foto-8.jpg",
            ]);
            
            Video::create([
                'url' => 'https://www.youtube.com/embed/ccLnI3qJL4w?feature=oembed',
                'video_id' => 'ccLnI3qJL4w'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-bg-1.jpg",
                'flag' => 'Background-1'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-bg-2.jpg",
                'flag' => 'Background-2'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-bg-3.jpg",
                'flag' => 'Background-3'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-bg-4.jpg",
                'flag' => 'Background-4'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-bg-5.jpg",
                'flag' => 'Background-5'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-bg-6.jpg",
                'flag' => 'Background-6'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-bg-7.jpg",
                'flag' => 'Background-7'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-1-preview-bg-8.jpg",
                'flag' => 'Background-8'
            ]);

        });
        $tenant8->run(function () {
            ProfilPasangan::create([
                'nama' => 'Sigit Randhika',
                'nama_panggilan' => 'Sigit',
                'nama_bapak' => 'Syahid Sobirin',
                'nama_ibu' => 'Diajeng Rosmalia',
                'kelamin' => 'Pria',
                'url_foto' => '/assets/img/galeri-foto/gold-2-preview-profile-1.png'
            ]);
            ProfilPasangan::create([
                'nama' => 'Fiani Saraswati',
                'nama_panggilan' => 'Fiani',
                'nama_bapak' => 'Omar Nazarullah',
                'nama_ibu' => 'Widya Abelardo',
                'kelamin' => 'Wanita',
                'url_foto' => '/assets/img/galeri-foto/gold-2-preview-profile-2.png'
            ]);
            AlamatGift::create([
                'nama' => 'Sigit Randhika',
                'no_hp' => '085992893045',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            AlamatGift::create([
                'nama' => 'Fiani',
                'no_hp' => '083683647812',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            RekeningGift::create([
                'nama' => 'Sigit Randhika',
                'bank' => 'BCA',
                'no_rekening' => '788239395719',
                'logo' => '/assets/img/bank/bca.png'
            ]);
            RekeningGift::create([
                'nama' => 'Fiani Saraswati',
                'bank' => 'CIMB',
                'no_rekening' => '321762374672',
                'logo' => '/assets/img/bank/cimb.png'
            ]);
            SubAcara::create([
                'nama' => 'Akad Nikah',
                'start_time' => Carbon::create(2023, 8, 15, 8, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Masjid Al Ikhlas KTP',
                'alamat' => 'Komplek, Jl. Karang Tengah Permai Arjuna, RT.002/RW.014, Karang Tim., Kec. Karang Tengah, Kota Tangerang, Banten 15157',
                'link_map' => 'https://goo.gl/maps/nHpzDT6Gw6XCXY9r5',
                'main_event' => true,
            ]);
            SubAcara::create([
                'nama' => 'Resepsi',
                'start_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 16, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Balai Ratu Permai',
                'alamat' => 'Jl. Tegal Rotan Raya No.11, Sawah Baru, Kec. Ciputat, Kota Tangerang Selatan, Banten 15412',
                'link_map' => 'https://goo.gl/maps/wK5Lprm3HSQPvo82A',
                'main_event' => false,
            ]);
            Musik::create([
                'url' => '/assets/music/galeri-musik/03.mp3',
                'title' => "You're Still The One (Shania Twain Cover)",
                'artist' => 'Teddy Swims'
            ]);
            $tamus=array("Akri","Dhimas","Faishal","Sonya");
            $numberPrefixes = ['62863', '62832', '62878', '62888', '62889', '62808', '62804', '62805', '62806', '62867'];
            $randomUcapan=[
                "Selamat menikah, sahabatku tersayang. Semoga kalian menjadi pasangan sejati sampai maut memisahkan, lekas dikaruniai keturunan yang saleh dan salehah. Aamiin. 😘😘",
                "❤️ Cinta merupakan anugerah terbaik yang diberikan Tuhan.🥰 Cinta juga merupakan penghargaan besar bagi mereka yang menerima. Selamat menikah, jagalah anugerah tersebut dengan baik. ❤️",
                "Kunci membangun hubungan pernikahan yang kuat dan harmonis adalah saling teguh memegang komitmen bersama. Selamat menikah, semoga menjadi pasangan yang abadi. 🥰🥰🥰",
                "❤️ Tetanggaku yang sudah jadi teman bermain dari kecil, selamat menikah! Semoga bahagia dan dilancarkan rezekinya selalu. Jangan lupakan teman kecilmu ini, ya! ❤️"
            ];
            Tamu::create([
                'nama' => 'Tony',
                'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
            ]);
            foreach ($tamus as $key => $tamu) {
                $tamuObbject = Tamu::create([
                    'nama' => $tamu,
                    'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
                ]);
                
                Ucapan::create([
                    'nama' => $tamuObbject->nama,
                    'kalimat' => $randomUcapan[$key],
                    'konfirmasi' => 'Hadir',
                    'tamu_id' => $tamuObbject->id
                ]);
            }
            Quote::create([
                'sumber' => "QS. Ar- Rum 21",
                'kalimat' => "Dan di antara tanda-tanda kekuasaan Allah ialah diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri supaya kamu merasa tentram di samping-Nya dan dijadikan-Nya rasa kasih sayang di antara kamu. Sesungguhnya yang demikian itu menjadi bukti kekuasaan Allah bagi kaum yang berfikir.",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-foto-1.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-foto-2.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-foto-3.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-foto-4.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-foto-5.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-foto-6.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-foto-7.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-foto-8.jpg",
            ]);
            
            Video::create([
                'url' => 'https://www.youtube.com/embed/ccLnI3qJL4w?feature=oembed',
                'video_id' => 'ccLnI3qJL4w'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-bg-1.jpg",
                'flag' => 'Background-1'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-bg-2.jpg",
                'flag' => 'Background-2'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-bg-3.jpg",
                'flag' => 'Background-3'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-bg-4.jpg",
                'flag' => 'Background-4'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-bg-5.jpg",
                'flag' => 'Background-5'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-bg-6.jpg",
                'flag' => 'Background-6'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-bg-7.jpg",
                'flag' => 'Background-7'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-2-preview-bg-8.jpg",
                'flag' => 'Background-8'
            ]);

        });
        $tenant9->run(function () {
            ProfilPasangan::create([
                'nama' => 'Farqy Tanjung',
                'nama_panggilan' => 'Farqy',
                'nama_bapak' => 'Reynaldi Noordien',
                'nama_ibu' => 'Eni Yahya',
                'kelamin' => 'Pria',
                'url_foto' => '/assets/img/galeri-foto/gold-3-preview-profile-1.png'
            ]);
            ProfilPasangan::create([
                'nama' => 'Aprilita Tio',
                'nama_panggilan' => 'Aprilita',
                'nama_bapak' => 'Aggil Wira',
                'nama_ibu' => 'Putrima Pertiwi',
                'kelamin' => 'Wanita',
                'url_foto' => '/assets/img/galeri-foto/gold-3-preview-profile-2.png'
            ]);
            AlamatGift::create([
                'nama' => 'Farqy Tanjung',
                'no_hp' => '085992893045',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            AlamatGift::create([
                'nama' => 'Aprilita Tio',
                'no_hp' => '083683647812',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            RekeningGift::create([
                'nama' => 'Farqy Tanjung',
                'bank' => 'BCA',
                'no_rekening' => '788239395719',
                'logo' => '/assets/img/bank/bca.png'
            ]);
            RekeningGift::create([
                'nama' => 'Aprilita Tio',
                'bank' => 'CIMB',
                'no_rekening' => '321762374672',
                'logo' => '/assets/img/bank/cimb.png'
            ]);
            SubAcara::create([
                'nama' => 'Akad Nikah',
                'start_time' => Carbon::create(2023, 8, 15, 8, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Masjid Al Ikhlas KTP',
                'alamat' => 'Komplek, Jl. Karang Tengah Permai Arjuna, RT.002/RW.014, Karang Tim., Kec. Karang Tengah, Kota Tangerang, Banten 15157',
                'link_map' => 'https://goo.gl/maps/nHpzDT6Gw6XCXY9r5',
                'main_event' => true,
            ]);
            SubAcara::create([
                'nama' => 'Resepsi',
                'start_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 16, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Balai Ratu Permai',
                'alamat' => 'Jl. Tegal Rotan Raya No.11, Sawah Baru, Kec. Ciputat, Kota Tangerang Selatan, Banten 15412',
                'link_map' => 'https://goo.gl/maps/wK5Lprm3HSQPvo82A',
                'main_event' => false,
            ]);
            Musik::create([
                'url' => '/assets/music/galeri-musik/03.mp3',
                'title' => "You're Still The One (Shania Twain Cover)",
                'artist' => 'Teddy Swims'
            ]);
            $tamus=array("Akri","Dhimas","Faishal","Sonya");
            $numberPrefixes = ['62863', '62832', '62878', '62888', '62889', '62808', '62804', '62805', '62806', '62867'];
            $randomUcapan=[
                "Selamat menikah, sahabatku tersayang. Semoga kalian menjadi pasangan sejati sampai maut memisahkan, lekas dikaruniai keturunan yang saleh dan salehah. Aamiin. 😘😘",
                "❤️ Cinta merupakan anugerah terbaik yang diberikan Tuhan.🥰 Cinta juga merupakan penghargaan besar bagi mereka yang menerima. Selamat menikah, jagalah anugerah tersebut dengan baik. ❤️",
                "Kunci membangun hubungan pernikahan yang kuat dan harmonis adalah saling teguh memegang komitmen bersama. Selamat menikah, semoga menjadi pasangan yang abadi. 🥰🥰🥰",
                "❤️ Tetanggaku yang sudah jadi teman bermain dari kecil, selamat menikah! Semoga bahagia dan dilancarkan rezekinya selalu. Jangan lupakan teman kecilmu ini, ya! ❤️"
            ];
            Tamu::create([
                'nama' => 'Tony',
                'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
            ]);
            foreach ($tamus as $key => $tamu) {
                $tamuObbject = Tamu::create([
                    'nama' => $tamu,
                    'no_whatsapp' => $numberPrefixes[array_rand($numberPrefixes)].randomNumberSequence()
                ]);
                
                Ucapan::create([
                    'nama' => $tamuObbject->nama,
                    'kalimat' => $randomUcapan[$key],
                    'konfirmasi' => 'Hadir',
                    'tamu_id' => $tamuObbject->id
                ]);
            }
            Quote::create([
                'sumber' => "QS. Ar- Rum 21",
                'kalimat' => "Dan di antara tanda-tanda kekuasaan Allah ialah diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri supaya kamu merasa tentram di samping-Nya dan dijadikan-Nya rasa kasih sayang di antara kamu. Sesungguhnya yang demikian itu menjadi bukti kekuasaan Allah bagi kaum yang berfikir.",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-foto-1.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-foto-2.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-foto-3.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-foto-4.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-foto-5.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-foto-6.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-foto-7.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-foto-8.jpg",
            ]);
            
            Video::create([
                'url' => 'https://www.youtube.com/embed/ccLnI3qJL4w?feature=oembed',
                'video_id' => 'ccLnI3qJL4w'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-bg-1.jpg",
                'flag' => 'Background-1'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-bg-2.jpg",
                'flag' => 'Background-2'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-bg-3.jpg",
                'flag' => 'Background-3'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-bg-4.jpg",
                'flag' => 'Background-4'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-bg-5.jpg",
                'flag' => 'Background-5'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-bg-6.jpg",
                'flag' => 'Background-6'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-bg-7.jpg",
                'flag' => 'Background-7'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/gold-3-preview-bg-8.jpg",
                'flag' => 'Background-8'
            ]);

        });



    }
}
