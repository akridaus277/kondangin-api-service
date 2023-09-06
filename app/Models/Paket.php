<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Paket extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nama',
        'harga',
    ];
    protected $hidden = ["created_at", "updated_at","undangan_id"];

    public function temas()
    {
        return $this->belongsToMany(Tema::class, 'paket_tema');
    }
}
