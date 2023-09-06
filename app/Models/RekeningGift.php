<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class RekeningGift extends Model
{
    use HasFactory;
    use BelongsToTenant;

    protected $fillable = [
        'nama',
        'bank',
        'no_rekening',
        'logo'
    ];
    protected $hidden = ["created_at", "updated_at","undangan_id"];

    // public function undangan()
    // {
    //     return $this->belongsTo(Undangan::class,'undangan_id','id');
    // }

}
