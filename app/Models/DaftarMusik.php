<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMusik extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist',
        'url'
    ];
    protected $hidden = ["created_at", "updated_at"];

}
