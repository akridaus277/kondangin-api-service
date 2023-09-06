<?php

namespace App\Http\Controllers;

use App\Models\AlamatGift;
use Illuminate\Http\Request;

class AlamatGiftController extends Controller
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
        // $paket = $tenant->paket;
        
        $alamat_gifts = [];
        

        foreach ($tenant->alamatGifts as $alamatGift) {
            $alamat_gift = ([
                'id' => $alamatGift->id,
                'nama' => $alamatGift->nama,
                'no_hp' => $alamatGift->no_hp,
                'alamat' => $alamatGift->alamat,
                'desa' => $alamatGift->desa,
                'kecamatan' => $alamatGift->kecamatan,
                'kota' => $alamatGift->kota,
                'provinsi' => $alamatGift->provinsi,
                'kode_pos' => $alamatGift->kode_pos

            ]);
            $alamat_gifts[] = $alamat_gift;
        }
        $response = ([
            'alamat_gifts' => $alamat_gifts   
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
     * @param  \App\Models\AlamatGift  $alamatGift
     * @return \Illuminate\Http\Response
     */
    public function show(AlamatGift $alamatGift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlamatGift  $alamatGift
     * @return \Illuminate\Http\Response
     */
    public function edit(AlamatGift $alamatGift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlamatGift  $alamatGift
     * @return \Illuminate\Http\Response
     */
    public function update($tenant, Request $request)
    {

        $request->validate([
                'id' => 'required',
                'nama' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required',
                'desa' => 'required',
                'kecamatan' => 'required',
                'kota' => 'required',
                'provinsi' => 'required',
                'kode_pos' => 'required'
        ]);
        // echo "sampe sini";
        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $alamat_gift = $tenant->alamatGifts->where('id',$request->id)->first();
    
        $alamat_gift->nama = $request->nama;
        $alamat_gift->no_hp = $request->no_hp;
        $alamat_gift->alamat = $request->alamat;
        $alamat_gift->desa = $request->desa;
        $alamat_gift->kecamatan = $request->kecamatan;
        $alamat_gift->kota = $request->kota;
        $alamat_gift->provinsi = $request->provinsi;
        $alamat_gift->kode_pos = $request->kode_pos;
 
        $alamat_gift->save();

        return $this->respondWithMessage("Alamat gift has successfully updated", 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlamatGift  $alamatGift
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlamatGift $alamatGift)
    {
        //
    }
}
