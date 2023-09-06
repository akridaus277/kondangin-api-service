<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;
class FotoBackground extends Model
{
    use HasFactory;
    use BelongsToTenant;
    protected $fillable = [
        'url',
        'flag'
    ];
    protected $hidden = ["created_at", "updated_at"];
}
