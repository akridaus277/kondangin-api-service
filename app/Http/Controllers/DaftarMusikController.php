<?php

namespace App\Http\Controllers;

use App\Models\DaftarMusik;
use Illuminate\Http\Request;

class DaftarMusikController extends Controller
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
        $daftarMusiks = [];
        

        

        foreach (DaftarMusik::all() as $musikElement) {
            $musik = ([
                'id' => $musikElement->id,
                'url' => $musikElement->url,
                'title' => $musikElement->title,
                'artist' => $musikElement->artist

            ]);
            $daftarMusiks[] = $musik;
        }
        $response = ([
            'daftarMusiks' => $daftarMusiks
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
     * @param  \App\Models\DaftarMusik  $daftarMusik
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarMusik $daftarMusik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaftarMusik  $daftarMusik
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarMusik $daftarMusik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DaftarMusik  $daftarMusik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarMusik $daftarMusik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaftarMusik  $daftarMusik
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarMusik $daftarMusik)
    {
        //
    }
}
