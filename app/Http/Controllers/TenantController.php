<?php

namespace App\Http\Controllers;

use App\Models\ProfilPasangan;
use App\Models\Tenant;
use App\Models\Tamu;
use App\Models\AlamatGift;
use App\Models\RekeningGift;
use App\Models\SubAcara;
use App\Models\Musik;
use App\Models\Quote;
use App\Models\Ucapan;
use App\Models\Foto;
use App\Models\FotoBackground;
use App\Models\Tema;
use App\Models\Video;
use App\Models\InvoiceUdangan;
use App\Models\Paket;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

function invoiceCodeGenerator(){
    
    $code="";
    do
        {
            $token = strtoupper(substr(md5(time()), 0, 4));
            
            // $token = $this->getToken(6, $application_id);
            $code = 'INV-'.$token . strftime("%d", time()).strftime("%m", time()).strftime("%y", time());
            $user_code = InvoiceUdangan::where('kode_invoice', $code)->first();
        }
        while(!empty($user_code));
    return $code;
}

function randomNumberSequence($requiredLength = 7, $highestDigit = 8) {
    $sequence = '';
    for ($i = 0; $i < $requiredLength; ++$i) {
        $sequence .= mt_rand(0, $highestDigit);
    }
    return $sequence;
}

class TenantController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tenant, $nama_tamu)
    {
        $profilPasangans = ProfilPasangan::all();
        $subAcaras = SubAcara::all();
        $musik = Musik::all();
        $fotos = Foto::all();
        $fotoBackgrounds = FotoBackground::all();
        $quote = Quote::all();
        $videos = Video::all();
        $alamatGifts = AlamatGift::all();
        $rekeningGifts = RekeningGift::all();
        $ucapans = Ucapan::orderBy('created_at', 'DESC')->get();
        
        $tamu = Tamu::where('nama', '=', $nama_tamu)->first(); 
        

        $response = ([
            'profilPasangans' => $profilPasangans,
            'subAcaras' => $subAcaras,
            'musik' => $musik,
            'fotos' => $fotos,
            'fotoBackgrounds' => $fotoBackgrounds,
            'quote' => $quote,
            'videos' => $videos,
            'alamatGifts' => $alamatGifts,
            'rekeningGifts' => $rekeningGifts,
            'ucapan' => $ucapans,
            'tamu' => $tamu
            
        ]);

        if ($tamu == null) {
            return $this->respondWithError(256, 404);
        }
        // Amethyst Satu
        if ($tenant->tema->id == 1) {
            return view('bronzeSatu', $response);
        }
        else if ($tenant->tema->id == 2) {
            return view('bronzeDua', $response);
        }
        else if ($tenant->tema->id == 3) {
            return view('bronzeTiga', $response);
        }
        else if ($tenant->tema->id == 4) {
            return view('silverSatu', $response);
        }
        else if ($tenant->tema->id == 5) {
            return view('silverDua', $response);
        }
        else if ($tenant->tema->id == 6) {
            return view('silverTiga', $response);
        }
        else if ($tenant->tema->id == 7) {
            return view('goldSatu', $response);
        }
        else if ($tenant->tema->id == 8) {
            return view('goldDua', $response);
        }
        else if ($tenant->tema->id == 9) {
            return view('goldTiga', $response);
        }
        else if ($tenant->tema->id == 10) {
            return view('amethystSatu', $response);
        }
        else if ($tenant->tema->id == 11) {
            return view('amethystDua', $response);
        }
        else if ($tenant->tema->id == 12) {
            return view('amethystTiga', $response);
        }
        // elseif (condition) {
        //     # code...
        // }
        
    }

    public function indexTema($tenant)
    {

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $paket = $tenant->paket;
        
        $temas = [];
        

        foreach ($paket->temas as $tema) {
            $tema = ([
                'id' => $tema->id,
                'nama' => $tema->nama,
                'cover' => $tema->cover,
                'selected' => $tema->id == $tenant->tema->id

            ]);
            $temas[] = $tema;
        }
        $response = ([
            'temas' => $temas   
        ]);

        

        // return $this->respond(auth()->user());

        return $this->respond($response,"Success");
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $tema = 0;
        if ($request->paket_id == 1) {
            $tema = 1;
        } elseif ($request->paket_id == 2) {
            $tema = 4;
        } elseif ($request->paket_id == 3) {
            $tema = 7;
        } elseif ($request->paket_id == 4) {
            $tema = 10;
        }
        $request->validate([
            'subdomain' => 'required',

        ]);
        $tenant = Tenant::create([
            'tenant_code'=>$request->subdomain,
            'tema_id' => $tema,
            'paket_id' => $request->paket_id,
            'user_id' => auth()->user()->id,
            'active' => false,
            'tenancy_db_username' => 'root',
            'tenancy_db_password' => '',

        ]);
        
        $tenant->domains()->create(['domain' => $request->subdomain]);

        $paket = Paket::where('id', $request->paket_id)->first();
        $diskon = 0;
        $invoiceUdangan = InvoiceUdangan::create([
            'kode_invoice' => invoiceCodeGenerator(),
            'sub_total' => $paket->harga,
            'diskon' => $diskon,
            'grand_total' => $paket->harga*(100-$diskon)/100,
            'user_id' => auth()->user()->id,
            'tenant_id' => $tenant->id,
            'status' => "UNPAID"

        ]);
        // Ini FLIP
        $response = Http::withHeaders([
            'Authorization' => "Basic ".env('FLIP_SECRET')
        ])->asForm()->post(env('FLIP_URL').'/v2/pwf/bill', [
            "title" => $invoiceUdangan->kode_invoice,
            "amount" => $invoiceUdangan->grand_total,
            "type" => "SINGLE",
            "step" => 2,
            "sender_name" => auth()->user()->name,
            "sender_email" => auth()->user()->email,
            "sender_phone_number" => auth()->user()->no_hp,
            "is_address_required" => 0,
            "is_phone_number_required" => 1,
            "redirect_url" => env('APP_URL').'/memberArea'
        ]);

        /* // Ini Midtrans
        $response = Http::withHeaders([
            'Authorization' => "Basic ".env('MIDTRANS_SECRET')
        ])->post(env('MIDTRANS_URL').'/v1/payment-links', [
            "transaction_details" => [
                "order_id" => $invoiceUdangan->kode_invoice,
                "gross_amount"=> $invoiceUdangan->grand_total
            ],
            "customer_required"=> true,
            "usage_limit"=>  5,
            "item_details"=> [
                ["id" => $tenant->id,
                "name"=> $tenant->tenant_code.".kondangin.org "."- ".$paket->nama,
                "price"=> $invoiceUdangan->grand_total,
                "quantity"=> 1,
                "brand"=> "Kondangin",
                "category"=> "Digital Wedding Invitation",
                "merchant_name"=> "Kondangin"]
                  
                
              ],
            "customer_details"=> [
                "first_name"=> auth()->user()->name,
                "email"=> auth()->user()->email,
                "phone"=> auth()->user()->no_hp,
                "notes"=> "Thank you for your order. Please follow the instructions to complete payment."
                
            ]
        ]); */
        
        var_dump($response->json());


        # FLIP
        if ($response->successful()) {
            $invoiceUdangan->bill_id = $response['link_id'];
            $invoiceUdangan->link_bayar = $response['link_url'];
            $invoiceUdangan->save();
        }

        /* # MIDTRANS
        if ($response->successful()) {
            $invoiceUdangan->bill_id = $response['order_id'];
            $invoiceUdangan->link_bayar = $response['payment_url'];
            $invoiceUdangan->save();
        } */

        $tenant->run(function () {
            ProfilPasangan::create([
                'nama' => 'John Doe',
                'nama_panggilan' => 'John',
                'nama_bapak' => 'Albert Einstein',
                'nama_ibu' => 'Marie Curie',
                'kelamin' => 'Pria',
                'url_foto' => "/assets/img/galeri-foto/pasangan-1.png"
            ]);
            ProfilPasangan::create([
                'nama' => 'Wanda Maximoff',
                'nama_panggilan' => 'Wanda',
                'nama_bapak' => 'Francis Xavier',
                'nama_ibu' => 'Susan Storm',
                'kelamin' => 'Wanita',
                'url_foto' => "/assets/img/galeri-foto/pasangan-2.png"
            ]);
            AlamatGift::create([
                'nama' => 'John',
                'no_hp' => '08718314988',
                'alamat' => 'Jl. Beton No.6',
                'desa' => 'Pondok Ranji',
                'kecamatan' => 'Ciputat Timur',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15412'
            ]);
            AlamatGift::create([
                'nama' => 'Wanda',
                'no_hp' => '08573122137',
                'alamat' => 'Jl. Permai Tengah VII',
                'desa' => 'Jurang Mangu Barat',
                'kecamatan' => 'Pondok Aren',
                'kota' => 'Tangerang Selatan',
                'provinsi' => 'Banten',
                'kode_pos' => '15223'
            ]);
            RekeningGift::create([
                'nama' => 'Nanda',
                'bank' => 'BCA',
                'no_rekening' => '15419747329175',
                'logo' => '/assets/img/bank/bca.png'
            ]);
            RekeningGift::create([
                'nama' => 'Aisyah',
                'bank' => 'Gopay',
                'no_rekening' => '43563103',
                'logo' => '/assets/img/bank/gopay.png'
            ]);
            SubAcara::create([
                'nama' => 'Akad  Nikah',
                'start_time' => Carbon::create(2023, 8, 15, 8, 0, 0),
                'end_time' => Carbon::create(2023, 8, 15, 10, 0, 0),
                'zona_waktu' => 'WIB',
                'tempat' => 'Balai Ratu Permai',
                'alamat' => 'Jl. Tegal Rotan Raya No.11, Sawah Baru, Kec. Ciputat, Kota Tangerang Selatan, Banten 15412',
                'link_map' => 'https://goo.gl/maps/wK5Lprm3HSQPvo82A',
                'main_event' => true,
            ]);
            SubAcara::create([
                'nama' => 'Resepsi Pernikahan',
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
            $tamus=array("Tony","Natasha","Zain","Siti");
            $numberPrefixes = ['62863', '62832', '62878', '62888', '62889', '62808', '62804', '62805', '62806', '62867'];
            $randomUcapan=[
                "Selamat menikah, sahabatku tersayang. Semoga kalian menjadi pasangan sejati sampai maut memisahkan, lekas dikaruniai keturunan yang saleh dan salehah. Aamiin. 😘😘",
                "❤️ Cinta merupakan anugerah terbaik yang diberikan Tuhan.🥰 Cinta juga merupakan penghargaan besar bagi mereka yang menerima. Selamat menikah, jagalah anugerah tersebut dengan baik. ❤️",
                "Kunci membangun hubungan pernikahan yang kuat dan harmonis adalah saling teguh memegang komitmen bersama. Selamat menikah, semoga menjadi pasangan yang abadi. 🥰🥰🥰",
                "❤️ Tetanggaku yang sudah jadi teman bermain dari kecil, selamat menikah! Semoga bahagia dan dilancarkan rezekinya selalu. Jangan lupakan teman kecilmu ini, ya! ❤️"
            ];
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
                'url' => "/assets/img/galeri-foto/foto-1.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/foto-2.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/foto-3.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/foto-4.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/foto-5.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/foto-6.jpg",
            ]);
            Foto::create([
                'url' => "/assets/img/galeri-foto/foto-7.jpg",
            ]);
            Video::create([
                'url' => 'https://www.youtube.com/embed/ccLnI3qJL4w?feature=oembed',
                'video_id' => 'ccLnI3qJL4w'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/background-1.jpg",
                'flag' => 'Background-1'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/background-2.jpg",
                'flag' => 'Background-2'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/background-3.jpg",
                'flag' => 'Background-3'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/background-4.jpg",
                'flag' => 'Background-4'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/background-5.jpg",
                'flag' => 'Background-5'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/background-6.jpg",
                'flag' => 'Background-6'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/background-7.jpg",
                'flag' => 'Background-7'
            ]);
            FotoBackground::create([
                'url' => "/assets/img/galeri-foto/background-8.jpg",
                'flag' => 'Background-8'
            ]);


            
            
        });
        if ($request->paket_id == 1 || $request->paket_id == 2) {
            $tenant->video->delete();
        }

        return $this->respondWithMessage("Undangan is Successfully Created", 200);
        
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Undangan  $undangan
     * @return \Illuminate\Http\Response
     */
    public function show($tenant, $nama_tamu)
    {
       

        $profilPasangans = ProfilPasangan::all();
        $subAcaras = SubAcara::all();
        $musik = Musik::all();
        $fotos = Foto::all();
        $fotoBackgrounds = FotoBackground::all();
        $quote = Quote::all();
        $videos = Video::all();
        $alamatGifts = AlamatGift::all();
        $rekeningGifts = RekeningGift::all();
        $ucapans = Ucapan::orderBy('created_at', 'DESC')->get();
        
        $tamu = Tamu::where('nama', '=', $nama_tamu)->first(); 
        

        $response = ([
            'profilPasangans' => $profilPasangans,
            'subAcaras' => $subAcaras,
            'musik' => $musik,
            'fotos' => $fotos,
            'fotoBackgrounds' => $fotoBackgrounds,
            'quote' => $quote,
            'videos' => $videos,
            'alamatGifts' => $alamatGifts,
            'rekeningGifts' => $rekeningGifts,
            'ucapan' => $ucapans,
            'tamu' => $tamu
            
        ]);

        if ($tamu == null) {
            return $this->respondWithError(256, 404);
        }

        return $this->respond($response,"Success");
        //
    }

    public function submitUcapan($tenant, Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tamu_id' => 'required',
            'kalimat' => 'required',
            'konfirmasi' => 'required'
        ]);

        $tamu = Tamu::find($request->tamu_id);
        $ucapan = new Ucapan;
        $ucapan->nama = $request->nama;
        $ucapan->kalimat = $request->kalimat;
        $ucapan->konfirmasi = $request->konfirmasi;
        $tamu->ucapan()->save($ucapan);

        return $this->respondWithMessage("Ucapan Successfully Submitted", 200);

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Undangan  $undangan
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
        //
    }

    public function editDomain(Request $request)
    {
        $user = auth()->user();
        // $tenant = Tenant::find($request->id);
        $tenant = $user->tenants->where('id',$request->id)->first();
        $domain = $tenant->domains() ->first();
        $domain->domain = $request->domain;
        $domain->save();
        

   

        return $this->respondWithMessage("Domain name has successfully edited", 200);

        //
    }
        public function domain($id)
    {
        $user = auth()->user();
        $tenant = $user->tenants->where('id',$id)->first();
        $invoiceUdangan = InvoiceUdangan::where('tenant_id', $tenant->id)->first();
       
        $domain = $tenant->domains() ->first();
        $paket = $tenant->paket()->first();
        

        $response = ([
            'id' => $domain->id,
            'domain' => $domain->domain,
            'tenant_id' => $domain->tenant_id,
            'paket' => $paket->nama,
            'harga_paket' => $paket->harga,
            'kode_invoice' => $invoiceUdangan->kode_invoice,
            'invoice_grand_total' => $invoiceUdangan->grand_total,
            'bill_id' => $invoiceUdangan->bill_id,
            'invoice_status' => $invoiceUdangan->status,
            'link_bayar' => $invoiceUdangan->link_bayar,
     

        ]);
        
        return $this->respond($response,"Success");


        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Undangan  $undangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    public function updateTema($tenant, Request $request)
    {

        $request->validate([
            'tema_id' => 'required',
        ]);

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $tema = Tema::where('id',$request->tema_id)->first();
    
        $tenant->tema()->associate($tema);
 
        $tenant->save();

        return $this->respondWithMessage("Tema has successfully updated", 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Undangan  $undangan
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
