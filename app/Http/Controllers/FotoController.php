<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

class FotoController extends Controller
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
        $fotos = [];
        

        

        foreach ($tenant->foto as $fotoElement) {
            $foto = ([
                'id' => $fotoElement->id,
                'url' => $fotoElement->url

            ]);
            $fotos[] = $foto;
        }
        $response = ([
            'fotos' => $fotos   
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
    public function create($tenant, Request $request)
    {
        $request->validate([
            'file' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'assets/img/galeri-foto/';
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
		// $file->move($tujuan_upload,$nama_file);

        $tenant->foto()->create([
            // 'url' => array_slice(config('tenancy.central_domains'), -1)[0].":8000/".$tujuan_upload."/".$nama_file,
            'url' => "/".$tujuan_upload."/".$nama_file
        ]);


        return $this->respondWithMessage("Foto has successfully uploaded", 200);
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
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show($tenant, $id)
    {
        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $foto = $tenant->foto()->where('id',$id)->first();

        $response = ([
            'id' => $foto->id,
            'url' => $foto->url
        ]);

        return $this->respond($response,"Success");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy($tenant, Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $foto = $tenant->foto()->where('id',$request->id)->first();
        if ($foto->url != '/assets/img/galeri-foto/foto-1.jpg' && 
        $foto->url != '/assets/img/galeri-foto/foto-2.jpg' && 
        $foto->url != '/assets/img/galeri-foto/foto-3.jpg' && 
        $foto->url != '/assets/img/galeri-foto/foto-4.jpg' && 
        $foto->url != '/assets/img/galeri-foto/foto-5.jpg' && 
        $foto->url != '/assets/img/galeri-foto/foto-6.jpg' && 
        $foto->url != '/assets/img/galeri-foto/foto-7.jpg' && 
        $foto->url != '/assets/img/galeri-foto/foto-8.jpg' &&
        $foto->url != '/assets/img/galeri-foto/foto-9.jpg' &&
        $foto->url != '/assets/img/galeri-foto/foto-10.jpg' &&
        $foto->url != '/assets/img/galeri-foto/foto-11.jpg' &&
        $foto->url != '/assets/img/galeri-foto/foto-12.jpg' ) {
            
            unlink(substr($foto->url, 1));
            
        }
        

        // File::delete($foto->url);
        // Storage::delete($foto->url);
        $foto->delete();

        return $this->respondWithMessage("Foto has successfully deleted", 200);
        //
    }
}
