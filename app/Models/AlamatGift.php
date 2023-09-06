<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class AlamatGift extends Model
{
    use HasFactory;
    use BelongsToTenant;

    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
        'desa',
        'kecamatan',
        'kota',
        'provinsi',
        'kode_pos'
    ];
    protected $hidden = ["created_at", "updated_at","undangan_id"];

    // public function undangan()
    // {
    //     return $this->belongsTo(Undangan::class,'undangan_id','id');
    // }
}
