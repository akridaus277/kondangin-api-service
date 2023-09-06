<?php

namespace App\Http\Controllers;

use App\Models\RekeningGift;
use Illuminate\Http\Request;

class RekeningGiftController extends Controller
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
        
        $rekening_gifts = [];
        

        foreach ($tenant->rekeningGifts as $rekeningGift) {
            $rekening_gift = ([
                'id' => $rekeningGift->id,
                'nama' => $rekeningGift->nama,
                'bank' => $rekeningGift->bank,
                'no_rekening' => $rekeningGift->no_rekening

            ]);
            $rekening_gifts[] = $rekening_gift;
        }
        $response = ([
            'rekening_gifts' => $rekening_gifts   
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
     * @param  \App\Models\RekeningGift  $rekeningGift
     * @return \Illuminate\Http\Response
     */
    public function show(RekeningGift $rekeningGift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekeningGift  $rekeningGift
     * @return \Illuminate\Http\Response
     */
    public function edit(RekeningGift $rekeningGift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekeningGift  $rekeningGift
     * @return \Illuminate\Http\Response
     */
    public function update($tenant, Request $request)
    {

        $request->validate([
                'id' => 'required',
                'nama' => 'required',
                'bank' => 'required',
                'no_rekening' => 'required'
        ]);
        $bankLogo = '';
        switch ($request->bank) {
            case "BRI":
                $bankLogo = '/assets/img/bank/bri.png';
              break;
            case "MANDIRI":
                $bankLogo = '/assets/img/bank/mandiri.png';
              break;
            case "BNI":
                $bankLogo = '/assets/img/bank/bni.png';
              break;
            case "BTN":
              $bankLogo = '/assets/img/bank/btn.png';
              break;
            case "BCA":
                $bankLogo = '/assets/img/bank/bca.png';
                break;
            case "DANAMON":
                $bankLogo = '/assets/img/bank/danamon.png';
                break;
            case "PERMATA":
                $bankLogo = '/assets/img/bank/permata.png';
                break;
            case "MAYBANK":
                $bankLogo = '/assets/img/bank/maybank.png';
                break;
            case "CIMB NIAGA":
                $bankLogo = '/assets/img/bank/cimb.png';
                break;
            case "OCBC NISP":
                $bankLogo = '/assets/img/bank/ocbc.png';
                break;
            case "MUAMALAT":
                $bankLogo = '/assets/img/bank/muamalat.png';
                break;
            case "MEGA":
                $bankLogo = '/assets/img/bank/mega.png';
                break;
            case "BUKOPIN":
                $bankLogo = '/assets/img/bank/bukopin.png';
                break;
            case "BSI":
                $bankLogo = '/assets/img/bank/bsi.png';
                break;
            case "BTPN":
                $bankLogo = '/assets/img/bank/btpn.png';
                break;
            case "GOPAY":
                $bankLogo = '/assets/img/bank/gopay.png';
                break;
            case "DANA":
                $bankLogo = '/assets/img/bank/dana.png';
                break;
            case "OVO":
                $bankLogo = '/assets/img/bank/ovo.png';
                break;
            case "SHOPEEPAY":
                $bankLogo = '/assets/img/bank/shopeepay.png';
                break;
            case "LINKAJA":
                $bankLogo = '/assets/img/bank/linkaja.png';
                break;
            case "DOKU":
                $bankLogo = '/assets/img/bank/doku.png';
                break;
            default:
              echo "not a value";
          }
  
        // echo "sampe sini";
        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $rekening_gift = $tenant->rekeningGifts->where('id',$request->id)->first();
    
        $rekening_gift->nama = $request->nama;
        $rekening_gift->bank = $request->bank;
        $rekening_gift->logo = $bankLogo;
        $rekening_gift->no_rekening = $request->no_rekening;

 
        $rekening_gift->save();

        return $this->respondWithMessage("Rekening gift has successfully updated", 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekeningGift  $rekeningGift
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekeningGift $rekeningGift)
    {
        //
    }
}
