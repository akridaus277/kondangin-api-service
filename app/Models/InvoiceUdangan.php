<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceUdangan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kode_invoice',
        'sub_total',
        'diskon',
        'grand_total',
        'status',
        'bukti_bayar',

        'user_id',
        'tenant_id'
    ];
    protected $hidden = ["created_at", "updated_at"];

    // public function undangan()
    // {
    //     return $this->belongsTo(Undangan::class,'undangan_id','id');
    // }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_id','id');
    }
}
