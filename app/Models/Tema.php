<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
    ];
    protected $hidden = ["created_at", "updated_at"];

    public function pakets()
    {
        return $this->belongsToMany(Paket::class, 'paket_tema');
    }
}
