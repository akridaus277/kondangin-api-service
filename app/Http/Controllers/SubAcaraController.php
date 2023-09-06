<?php

namespace App\Http\Controllers;

use App\Models\SubAcara;
use Illuminate\Http\Request;

class SubAcaraController extends Controller
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
        $subAcaras = [];
        

        

        foreach ($tenant->subAcara as $sub_acara) {
            $subAcara = ([
                'id' => $sub_acara->id,
                'nama' => $sub_acara->nama,
                'start_time' => $sub_acara->start_time,
                'end_time' => $sub_acara->end_time,
                'zona_waktu' => $sub_acara->zona_waktu,
                'tempat' => $sub_acara->tempat,
                'alamat' => $sub_acara->alamat,
                'link_map' => $sub_acara->link_map,
                'lattitude' => $sub_acara->lattitude,
                'longitude' => $sub_acara->longitude,
                'main_event' => $sub_acara->main_event,

            ]);
            $subAcaras[] = $subAcara;
        }
        $response = ([
            'sub_acaras' => $subAcaras            
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
     * @param  \App\Models\SubAcara  $subAcara
     * @return \Illuminate\Http\Response
     */
    public function show($tenant, $id)
    {
        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $sub_acara = $tenant->subAcara()->where('id',$id)->first();

        $response = ([
            'id' => $sub_acara->id,
            'nama' => $sub_acara->nama,
            'start_time' => $sub_acara->start_time,
            'end_time' => $sub_acara->end_time,
            'zona_waktu' => $sub_acara->zona_waktu,
            'tempat' => $sub_acara->tempat,
            'alamat' => $sub_acara->alamat,
            'link_map' => $sub_acara->link_map,
            'lattitude' => $sub_acara->lattitude,
            'longitude' => $sub_acara->longitude,
            'main_event' => $sub_acara->main_event,
        ]);

        return $this->respond($response,"Success");
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubAcara  $subAcara
     * @return \Illuminate\Http\Response
     */
    public function edit(SubAcara $subAcara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubAcara  $subAcara
     * @return \Illuminate\Http\Response
     */
    public function update($tenant, Request $request)
    {

        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'zona_waktu' => 'required',
            'tempat' => 'required',
            'alamat' => 'required',
            'link_map' => 'required',
            'main_event' => 'required',
        ]);

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $sub_acara = $tenant->subAcara()->where('id',$request->id)->first();

        $sub_acara->fill($request->post())->save();

        return $this->respondWithMessage("Sub Acara has successfully updated", 200);
        // return $this->respond($profil_pasangan,"Success");

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubAcara  $subAcara
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubAcara $subAcara)
    {
        //
    }
}
