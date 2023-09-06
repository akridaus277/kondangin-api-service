<?php

namespace App\Http\Controllers;

use App\Models\Musik;
use Illuminate\Http\Request;

class MusikController extends Controller
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
        $musik = $tenant->musik;
        

        $response = ([
                'id' => $musik->id,
                'url' => $musik->url,
                'title' => $musik->title,
                'artist' => $musik->artist 
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
     * @param  \App\Models\Musik  $musik
     * @return \Illuminate\Http\Response
     */
    public function show(Musik $musik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Musik  $musik
     * @return \Illuminate\Http\Response
     */
    public function edit(Musik $musik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Musik  $musik
     * @return \Illuminate\Http\Response
     */
    public function update($tenant, Request $request)
    {

        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'url' => 'required',

        ]);

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $musik = $tenant->musik;

        
        

        $musik->artist = $request->artist;
        $musik->title = $request->title;
        $musik->url = $request->url;

        $musik->save();

        

        // $profil_pasangan->fill($request->post())->save();

        return $this->respondWithMessage("Musik has successfully updated", 200);
        // return $this->respond($profil_pasangan,"Success");

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Musik  $musik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Musik $musik)
    {
        //
    }
}
