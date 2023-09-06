<?php

namespace App\Http\Controllers;

use App\Models\FotoBackground;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFotoBackgroundRequest;
use App\Http\Requests\UpdateFotoBackgroundRequest;
use Image;

class FotoBackgroundController extends Controller
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
        $fotoBackgrounds = [];
        

        

        foreach ($tenant->fotoBackground as $fotoElement) {
            $foto = ([
                'id' => $fotoElement->id,
                'url' => $fotoElement->url,
                'flag' => $fotoElement->flag

            ]);
            $fotoBackgrounds[] = $foto;
        }
        $response = ([
            'fotoBackgrounds' => $fotoBackgrounds
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
     * @param  \App\Http\Requests\StoreFotoBackgroundRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFotoBackgroundRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FotoBackground  $fotoBackground
     * @return \Illuminate\Http\Response
     */
    public function show(FotoBackground $fotoBackground)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FotoBackground  $fotoBackground
     * @return \Illuminate\Http\Response
     */
    public function edit(FotoBackground $fotoBackground)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFotoBackgroundRequest  $request
     * @param  \App\Models\FotoBackground  $fotoBackground
     * @return \Illuminate\Http\Response
     */
    public function update($tenant, Request $request)
    {

        $request->validate([
            'id' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $foto_background = $tenant->fotoBackground()->where('id',$request->id)->first();

         // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'assets/img/galeri-foto/';
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

        if ($foto_background->url != '/assets/img/galeri-foto/background-1.jpg' && 
        $foto_background->url != '/assets/img/galeri-foto/background-2.jpg' && 
        $foto_background->url != '/assets/img/galeri-foto/background-3.jpg' && 
        $foto_background->url != '/assets/img/galeri-foto/background-4.jpg' && 
        $foto_background->url != '/assets/img/galeri-foto/background-5.jpg' && 
        $foto_background->url != '/assets/img/galeri-foto/background-6.jpg' && 
        $foto_background->url != '/assets/img/galeri-foto/background-7.jpg' && 
        $foto_background->url != '/assets/img/galeri-foto/background-8.jpg' ) {
            
            echo $foto_background->url;
            unlink(substr($foto_background->url, 1));
        }
        

        $foto_background->url = "/".$tujuan_upload.$nama_file;
        $foto_background->save();

        

        // $profil_pasangan->fill($request->post())->save();

        return $this->respondWithMessage($foto_background->url, 200);
        // return $this->respond($profil_pasangan,"Success");

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FotoBackground  $fotoBackground
     * @return \Illuminate\Http\Response
     */
    public function destroy(FotoBackground $fotoBackground)
    {
        //
    }
}
