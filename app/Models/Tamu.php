<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Tamu extends Model
{
    use HasFactory;
    use BelongsToTenant;
    protected $fillable = [
        'nama',
        'no_whatsapp'
    ];
    protected $hidden = ["created_at", "updated_at","undangan_id"];

    public function ucapan()
    {
        return $this->hasOne(Ucapan::class);
    }

    // public function undangan()
    // {
    //     return $this->belongsTo(Undangan::class,'undangan_id','id');
    // }
}
