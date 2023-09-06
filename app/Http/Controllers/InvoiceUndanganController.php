<?php

namespace App\Http\Controllers;

use App\Models\InvoiceUdangan;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

function invoiceCodeGenerator(){
    
    $code="";
    do
        {
            $token = strtoupper(substr(md5(time()), 0, 4));
            
            // $token = $this->getToken(6, $application_id);
            $code = 'INV-'. $token . strftime("%d", time()).strftime("%m", time()).strftime("%y", time());
            $user_code = InvoiceUdangan::where('kode_invoice', $code)->first();
        }
        while(!empty($user_code));
    return $code;
}

class InvoiceUndanganController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    
    public function createPaid(Request $request)
    {
        $request->validate([
            'sub_total' => 'required',
            'diskon' => 'required',
            'grand_total' => 'required',
            'user_id' => 'required',
            'tenant_id' => 'required',
            'bukti_bayar' => 'required'
        ]);
        

        $invoiceUdangan = InvoiceUdangan::create([
            'kode_invoice' => invoiceCodeGenerator(),
            'sub_total' => $request->sub_total,
            'diskon' => $request->diskon,
            'grand_total' => $request->grand_total,
            'user_id' => $request->user_id,
            'tenant_id' => $request->tenant_id,
            'status' => "PAID"

        ]);
        $tenant = Tenant::find($request->tenant_id);
        $tenant->active = true;
        $tenant->save();

        return $this->respondWithMessage('Paid Invoice successfully created',200);
        // return $this->respond($tenant,"Success");
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createBill(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => "Basic ".env('FLIP_SECRET')
        ])->asForm()->post('https://bigflip.id/api/v2/pwf/bill', [
            "title" => invoiceCodeGenerator(),
            "amount" => 99000,
            "type" => "SINGLE",
            "step" => 2,
            "sender_name" => "Fachry",
            "sender_email" => "fachryfirdaus777@gmail.com",
            "sender_phone_number" => "089679048560",
            "is_address_required" => 0,
            "is_phone_number_required" => 1
        ]);
        if ($response->successful()) {
            return $this->respond($response->json(),200);
        }

        return $this->respond("hilih",200);
    }

    public function acceptPaymentCallback(Request $request)
    {
        

        

        #FLIP
        $request = json_decode( $request->data, true);
        $invoiceUdangan = InvoiceUdangan::where('bill_id', $request['bill_link_id'])->first();
        $tenant = $tenant = Tenant::find($invoiceUdangan->tenant_id);
        if ($request['status'] == "SUCCESSFUL") {
            $invoiceUdangan->status = $request['status'];
            $invoiceUdangan->payment_id = $request['id'];
            $invoiceUdangan->status = "PAID";
            $invoiceUdangan->sender_bank = $request['sender_bank'];
            $invoiceUdangan->sender_bank_type = $request['sender_bank_type'];
            $invoiceUdangan->paid_at = $request['created_at'];
            $invoiceUdangan->save();
            $tenant->active = true;
            $tenant->save();
        }

        # MIDTRANS
        /* $order_id = substr($request->order_id,0,14);
  

        $invoiceUdangan = InvoiceUdangan::where('kode_invoice', $order_id)->first();
       
        $tenant = $tenant = Tenant::find($invoiceUdangan->tenant_id);
        $invoiceUdangan->bill_id = $request->order_id;
         if (($request->transaction_status == "capture" || $request->transaction_status == "settlement")) {
            
            $invoiceUdangan->payment_id = $request->transaction_id;
            $invoiceUdangan->status = "PAID";
            if (!($request->bank)) {
                if ($request->payment_type == 'gopay') {
                    $invoiceUdangan->sender_bank = $request->payment_type;
                }elseif ($request->payment_type == 'qris') {
                    $invoiceUdangan->sender_bank = $request->issuer;
                }elseif ($request->payment_type == 'shopeepay') {
                    $invoiceUdangan->sender_bank = $request->payment_type;
                }elseif ($request->payment_type == 'bank_transfer') {
                    if ($request->permata_va_number) {
                        $invoiceUdangan->sender_bank = 'permata';
                    }else{
                        $invoiceUdangan->sender_bank = $request->va_numbers [0] ['bank'];
                    }
                }elseif ($request->payment_type == 'echannel') {
                    $invoiceUdangan->sender_bank = 'mandiri';
                }elseif ($request->payment_type == 'bca_klikpay') {
                        $invoiceUdangan->sender_bank = 'bca';
                }elseif ($request->payment_type == 'bca_klikbca') {
                        $invoiceUdangan->sender_bank = 'bca';
                }elseif ($request->payment_type == 'bri_epay') {
                    $invoiceUdangan->sender_bank = 'bri';
                }elseif ($request->payment_type == 'cimb_clicks') {
                    $invoiceUdangan->sender_bank = 'cimb';
                }elseif ($request->payment_type == 'danamon_online') {
                    $invoiceUdangan->sender_bank = 'danamon';
                }elseif ($request->payment_type == 'cstore') {
                    $invoiceUdangan->sender_bank = $request->store;
                }elseif ($request->payment_type == 'akulaku') {
                    $invoiceUdangan->sender_bank = $request->payment_type;
                }elseif ($request->payment_type == 'uob_ezpay') {
                    $invoiceUdangan->sender_bank = 'uob';
                }

            }else{
                
                $invoiceUdangan->sender_bank = $request->bank;
                

            }
            
            $invoiceUdangan->sender_bank_type = $request->payment_type;
            $invoiceUdangan->paid_at = $request->transaction_time;
            $invoiceUdangan->save();
            $tenant->active = true;
            $tenant->save();
        } */
        
        

        return $this->respond("Successfully Called AcceptPayment CallbackFunction",200);
    }

    public function recurringPaymentCallback(Request $request)
    {


        return $this->respond("Successfully Called RecurringPayment CallbackFunction",200);
    }

    public function payaccountPaymentCallback(Request $request)
    {


        return $this->respond("Successfully Called PayAccountPayment CallbackFunction",200);
    }
}
