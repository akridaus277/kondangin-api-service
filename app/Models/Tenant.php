<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase as TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;


class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains, HasFactory;



    public static function getCustomColumns(): array
{
    return [
        'id',
        'tema_id',
        'paket_id',
        'user_id',
        'active',
        'tenant_code'
    ];
}

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class,'paket_id','id');
    }

    public function tema()
    {
        return $this->belongsTo(Tema::class,'tema_id','id');
    }

    public function profilPasangan()
    {
        return $this->hasMany(ProfilPasangan::class);
    }
    public function subAcara()
    {
        return $this->hasMany(SubAcara::class);
    }
    public function tamu()
    {
        return $this->hasMany(Tamu::class);
    }
    public function ucapan()
    {
        return $this->hasMany(Ucapan::class);
    }
    public function foto()
    {
        return $this->hasMany(Foto::class);
    }
    public function quote()
    {
        return $this->hasMany(Quote::class);
    }
    public function musik()
    {
        return $this->hasOne(Musik::class);
    }
    public function video()
    {
        return $this->hasOne(Video::class);
    }
    public function fotoBackground()
    {
        return $this->hasMany(FotoBackground::class);
    }
    public function alamatGifts()
    {
        return $this->hasMany(AlamatGift::class);
    }
    public function rekeningGifts()
    {
        return $this->hasMany(RekeningGift::class);
    }

    public function scopeWithWhereHas($query, $relation, $constraint){
        return $query->whereHas($relation, $constraint)
        ->with([$relation => $constraint]);
       }
}