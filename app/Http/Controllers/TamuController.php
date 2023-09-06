<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\TamuImport;
use Maatwebsite\Excel\Facades\Excel;


class TamuController extends Controller
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
        $tamus = [];
        

        

        foreach ($tenant->tamu->where('nama', '!=' ,'Tony') as $tamuElement) {
            $tamu = ([
                'id' => $tamuElement->id,
                'nama' => $tamuElement->nama,
                'no_whatsapp' => $tamuElement->no_whatsapp

            ]);
            $tamus[] = $tamu;
        }
        $response = ([
            'tamus' => $tamus          
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
            'nama' => 'required',
            
        ]);

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        if ($request->no_whatsapp) {
            $tenant->tamu()->create([
                'nama' => $request->nama,
                'no_whatsapp' => $request->no_whatsapp
            ]);
        }else{
            $tenant->tamu()->create([
                'nama' => $request->nama,
                'no_whatsapp' => ""
            ]);
        }

        


        return $this->respondWithMessage("Tamu has successfully created", 200);
    }

    public function import($tenant, Request $request)
    {
        $request->validate([
            'file' => 'required|file',
            
        ]);
        $fileImport = request()->file('file');

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        Excel::import(new TamuImport($tenant->id),$fileImport);


        


        return $this->respondWithMessage("Tamu has successfully imported", 200);
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
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function show($tenant, $id)
    {
        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $tamu = $tenant->tamu()->where('id',$id)->first();

        $response = ([
            'id' => $tamu->id,
            'nama' => $tamu->nama,
            'no_whatsapp' => $tamu->no_whatsapp
        ]);

        return $this->respond($response,"Success");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function edit(Tamu $tamu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function update($tenant, Request $request)
    {

        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            
        ]);

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $tamu = $tenant->tamu()->where('id',$request->id)->first();

        $tamu->fill($request->post())->save();

        return $this->respondWithMessage("Tamu has successfully updated", 200);
        // return $this->respond($profil_pasangan,"Success");

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function destroy($tenant, Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $tamu = $tenant->tamu()->where('id',$request->id)->first();
        

        $tamu->delete();

        return $this->respondWithMessage("Tamu has successfully deleted", 200);
        //
    }
}
