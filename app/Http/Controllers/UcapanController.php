<?php

namespace App\Http\Controllers;

use App\Models\Ucapan;
use Illuminate\Http\Request;

class UcapanController extends Controller
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
        $ucapans = [];
        

        

            foreach ($tenant->ucapan as $ucapanElement) {
            $ucapan = ([
                'id' => $ucapanElement->id,
                'nama' => $ucapanElement->nama,
                'kalimat' => $ucapanElement->kalimat,
                'konfirmasi' => $ucapanElement->konfirmasi,
                'tamu_id' => $ucapanElement->tamu_id,
                'nama_tamu' => $tenant->tamu()->where('id',$ucapanElement->tamu_id)->first()->nama,
                'created_at' => $ucapanElement->created_at->toDateTimeString(),

            ]);
            $ucapans[] = $ucapan;
        }
        $response = ([
            'ucapans' => $ucapans       
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
     * @param  \App\Models\Ucapan  $ucapan
     * @return \Illuminate\Http\Response
     */
    public function show(Ucapan $ucapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ucapan  $ucapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ucapan $ucapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ucapan  $ucapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ucapan $ucapan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ucapan  $ucapan
     * @return \Illuminate\Http\Response
     */
    public function destroy($tenant, Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $ucapan = $tenant->ucapan()->where('id',$request->id)->first();
        

        $ucapan->delete();

        return $this->respondWithMessage("Ucapan has successfully deleted", 200);
        //
    }
}
