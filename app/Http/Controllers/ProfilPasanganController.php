<?php

namespace App\Http\Controllers;

use App\Models\ProfilPasangan;
use Illuminate\Http\Request;
use Image;


class ProfilPasanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tenant)
    {

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $pasangans = [];
        

        

        foreach ($tenant->profilPasangan as $profil_pasangan) {
            $pasangan = ([
                'id' => $profil_pasangan->id,
                'nama' => $profil_pasangan->nama,
                'nama_panggilan' => $profil_pasangan->nama_panggilan,
                'kelamin' => $profil_pasangan->kelamin,
                'url_foto' => $profil_pasangan->url_foto,
                'nama_bapak' => $profil_pasangan->nama_bapak,
                'nama_ibu' => $profil_pasangan->nama_ibu

            ]);
            $pasangans[] = $pasangan;
        }
        $response = ([
            'profil_pasangans' => $pasangans            
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
    public function create()
    {
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
     * @param  \App\Models\ProfilPasangan  $profilPasangan
     * @return \Illuminate\Http\Response
     */
    public function show($tenant, $id)
    {
        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $profil_pasangan = $tenant->profilPasangan()->where('id',$id)->first();

        $response = ([
            'id' => $profil_pasangan->id,
            'nama'=> $profil_pasangan->nama, 
            'kelamin' => $profil_pasangan-> kelamin,
            'nama_panggilan' => $profil_pasangan->nama_panggilan,
            'nama_bapak' => $profil_pasangan->nama_bapak,
            'nama_ibu' => $profil_pasangan->nama_ibu,
            'url_foto' => $profil_pasangan->url_foto,
            'tenant_id' => $profil_pasangan->tenant_id,
        ]);

        return $this->respond($response,"Success");
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilPasangan  $profilPasangan
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfilPasangan $profilPasangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfilPasangan  $profilPasangan
     * @return \Illuminate\Http\Response
     */
    public function update($tenant, Request $request)
    {

        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'nama_panggilan' => 'required',
            'kelamin' => 'required',
            /* 'file' => 'required|file|image|mimes:jpeg,png,jpg|max:1024', */
            'nama_bapak' => 'required',
            'nama_ibu' => 'required'
        ]);

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $profil_pasangan = $tenant->profilPasangan()->where('id',$request->id)->first();

         // menyimpan data file yang diupload ke variabel $file
         $message = gettype($request->file);
        if ($request->file === "false") {
            if ($profil_pasangan->url_foto != null ) {
                
                unlink(substr($profil_pasangan->url_foto, 1));
                $profil_pasangan->url_foto = "";
            }

            
        }else if($request->file('file') != null) {
            $request->validate([
                'file' => 'file|image|mimes:jpeg,png,jpg',
            ]);
           
            $file = $request->file('file');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'assets/img/galeri-foto';
            // $file->move($tujuan_upload,$nama_file);
            $img = Image::make($file->path());
            if ($img->height() >= $img->width()) {
                if ($img->height() > 1200) {
                    $img->resize(null, 1200, function ($constraint) {
    
                        $constraint->aspectRatio();
            
                    });
                }
            }else{
                if ($img->width() > 1200) {
                    $img->resize(1200, null, function ($constraint) {
    
                        $constraint->aspectRatio();
            
                    });
                }
            }
            
            $img->save($tujuan_upload.'/'.$nama_file);
            
            
            if ($profil_pasangan->url_foto != '/assets/img/galeri-foto/pasangan-1.png' && $profil_pasangan->url_foto != '/assets/img/galeri-foto/pasangan-2.png' && $profil_pasangan->url_foto!=null) {
                
                unlink(substr($profil_pasangan->url_foto, 1));
            }
            $profil_pasangan->url_foto = "/".$tujuan_upload."/".$nama_file;
        }
		
        

        $profil_pasangan->nama = $request->nama;
        $profil_pasangan->nama_panggilan = $request->nama_panggilan;
        $profil_pasangan->kelamin = $request->kelamin;
        $profil_pasangan->nama_bapak = $request->nama_bapak;
        $profil_pasangan->nama_ibu = $request->nama_ibu;
        
        $profil_pasangan->save();

        

        // $profil_pasangan->fill($request->post())->save();

        return $this->respondWithMessage("Profil Pasangan has successfully updated, {$message}", 200);
        // return $this->respond($profil_pasangan,"Success");

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilPasangan  $profilPasangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilPasangan $profilPasangan)
    {
        //
    }
}
