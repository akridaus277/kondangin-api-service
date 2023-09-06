<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
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
        $quotes = [];
        

        

        foreach ($tenant->quote as $quoteElement) {
            $quote = ([
                'id' => $quoteElement->id,
                'sumber' => $quoteElement->sumber,
                'kalimat' => $quoteElement->kalimat,
                

            ]);
            $quotes[] = $quote;
        }
        $response = ([
            'quotes' => $quotes            
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
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update($tenant, Request $request)
    {

        $request->validate([
            'id' => 'required',
            'sumber' => 'required',
            'kalimat' => 'required',
        ]);

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $quote = $tenant->quote()->where('id',$request->id)->first();

        $quote->sumber = $request->sumber;
        $quote->kalimat = $request->kalimat;

        $quote->save();

        

        // $profil_pasangan->fill($request->post())->save();

        return $this->respondWithMessage("Quote has successfully updated", 200);
        // return $this->respond($profil_pasangan,"Success");

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
