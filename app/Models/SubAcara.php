<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class SubAcara extends Model
{
    use HasFactory;
    use BelongsToTenant;
    protected $fillable = [
        'nama',
        'start_time',
        'end_time',
        'zona_waktu',
        'tempat',
        'alamat',
        'link_map',
        'main_event',
    ];
    protected $hidden = ["created_at", "updated_at","undangan_id"];
    
    // public function undangan()
    // {
    //     return $this->belongsTo(Undangan::class,'undangan_id','id');
    // }
}
