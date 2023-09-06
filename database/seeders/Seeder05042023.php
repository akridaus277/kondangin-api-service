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
class Seeder05042023 extends Seeder
{
    public function run()
    {
        DB::table('temas')->insert([
            'nama' => 'Amethyst Dua',
            'cover' => '/assets/img/amethyst-2-cover.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('paket_tema')->insert([
            'paket_id' => 4,
            'tema_id' => 11,
        ]);
        DB::table('temas')->insert([
            'nama' => 'Amethyst Tiga',
            'cover' => '/assets/img/amethyst-3-cover.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('paket_tema')->insert([
            'paket_id' => 4,
            'tema_id' => 12,
        ]);
        $tenant10 = Tenant::create([
            'tenant_code' => 'amethystdua',
            'tema_id' => 11,
            'paket_id' => 4,
            'user_id' => 2,
            'active' => true,
            'tenancy_db_username' => 'kond8002_root',
            'tenancy_db_password' => '',
        ]);
        $tenant11 = Tenant::create([
            'tenant_code' => 'amethysttiga',
            'tema_id' => 12,
            'paket_id' => 4,
            'user_id' => 2,
            'active' => true,
            'tenancy_db_username' => 'kond8002_root',
            'tenancy_db_password' => '',
        ]);
        $tenant10->domains()->create(['domain' => 'amethystdua']);
        $tenant11->domains()->create(['domain' => 'amethysttiga']);
        $tenant10->run(function () {
            ProfilPasangan::create([
                'nama' => 'Haikal Rizkyananta',
                'nama_panggilan' => 'Haikal',
                'nama_bapak' => 'Yudha Bertauli',
                'nama_ibu' => 'Astrid Anwisa',
                'kelamin' => 'Pria',
                'url_foto' => '/assets/img/galeri-foto/amethyst-2-preview-profile-1.jpg'
            ]);
            ProfilPasangan::create([
                'nama' => 'Bytta Anggraini',
                'nama_panggilan' => 'Bytta',
                'nama_bapak' => 'Rheza Adriarso',
                'nama_ibu' => 'Nurtin Zahaira',
                'kelamin' => 'Wanita',
                'url_foto' => '/assets/img/galeri-foto/amethyst-2-preview-profile-2.jpg'
            ]);
            AlamatGift::create([
                'nama' => 'Haikal Rizkyananta',
                'no_hp' => '085992893045',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            AlamatGift::create([
                'nama' => 'Bytta Anggraini',
                'no_hp' => '083683647812',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            RekeningGift::create([
                'nama' => 'Haikal Rizkyananta',
                'bank' => 'BCA',
                'no_rekening' => '788239395719',
                'logo' => '/assets/img/bank/bca.png'
            ]);
            RekeningGift::create([
                'nama' => 'Bytta Anggraini',
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
                'url' => "/assets/img/galeri-foto/amethyst-2-preview-foto-1.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/amethyst-2-preview-foto-2.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/amethyst-2-preview-foto-3.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/amethyst-2-preview-foto-4.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/amethyst-2-preview-foto-5.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/amethyst-2-preview-foto-6.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/amethyst-2-preview-foto-7.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/amethyst-2-preview-foto-8.jpg",
            ]);
            
            Video::create([
                'url' => 'https://www.youtube.com/embed/ccLnI3qJL4w?feature=oembed',
                'video_id' => 'ccLnI3qJL4w'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/amethyst-2-preview-bg-1.jpg",
                'flag' => 'Background-1'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/amethyst-2-preview-bg-2.jpg",
                'flag' => 'Background-2'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/amethyst-2-preview-bg-3.jpg",
                'flag' => 'Background-3'
            ]);
            
        });
        $tenant11->run(function () {
            ProfilPasangan::create([
                'nama' => 'Richard Wardani',
                'nama_panggilan' => 'Richard',
                'nama_bapak' => 'Michael Destrya',
                'nama_ibu' => 'Retno Khansa',
                'kelamin' => 'Pria',
                'url_foto' => '/assets/img/galeri-foto/amethyst-3-preview-profile-1.jpg'
            ]);
            ProfilPasangan::create([
                'nama' => 'Josephine Balqis',
                'nama_panggilan' => 'Josephine',
                'nama_bapak' => 'Arrivaldi Herlin',
                'nama_ibu' => 'Wiwied Rustam',
                'kelamin' => 'Wanita',
                'url_foto' => '/assets/img/galeri-foto/amethyst-3-preview-profile-2.jpg'
            ]);
            AlamatGift::create([
                'nama' => 'Richard Wardani',
                'no_hp' => '085992893045',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            AlamatGift::create([
                'nama' => 'Josephine Balqis',
                'no_hp' => '083683647812',
                'alamat' => 'Jl. Wahid Hasyim No.3, Pd. Jaya, Kec. Pd. Aren, Kota Tangerang, Banten 15224, Indonesia',
                'desa' => ' Pondok Jaya',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15224'
            ]);
            RekeningGift::create([
                'nama' => 'Richard Wardani',
                'bank' => 'BCA',
                'no_rekening' => '788239395719',
                'logo' => '/assets/img/bank/bca.png'
            ]);
            RekeningGift::create([
                'nama' => 'Josephine Balqis',
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
                'url' => "/assets/img/galeri-foto/amethyst-3-preview-foto-1.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/amethyst-3-preview-foto-2.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/amethyst-3-preview-foto-3.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/amethyst-3-preview-foto-4.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/amethyst-3-preview-foto-5.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/amethyst-3-preview-foto-6.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/amethyst-3-preview-foto-7.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/amethyst-3-preview-foto-8.jpg",
            ]);
            
            Video::create([
                'url' => 'https://www.youtube.com/embed/ccLnI3qJL4w?feature=oembed',
                'video_id' => 'ccLnI3qJL4w'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/amethyst-3-preview-bg-1.jpg",
                'flag' => 'Background-1'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/amethyst-3-preview-bg-2.jpg",
                'flag' => 'Background-2'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/amethyst-3-preview-bg-3.jpg",
                'flag' => 'Background-3'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/amethyst-3-preview-bg-4.jpg",
                'flag' => 'Background-4'
            ]);
            

        });
    }
    
}