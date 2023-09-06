<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase as TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Undangan extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    protected $fillable = [
        'kode_undangan',
    ];

    protected $hidden = ["created_at", "updated_at","user_id","paket_id"];

    // public function profilpasangans()
    // {
    //     return $this->hasMany(ProfilPasangan::class);
    // }

    // public function alamatgifts()
    // {
    //     return $this->hasMany(AlamatGift::class);
    // }

    // public function rekeninggifts()
    // {
    //     return $this->hasMany(RekeningGift::class);
    // }

    // public function subacaras()
    // {
    //     return $this->hasMany(SubAcara::class);
    // }

    // public function musik()
    // {
    //     return $this->hasOne(Musik::class);
    // }

    // public function tamus()
    // {
    //     return $this->hasMany(Tamu::class);
    // }

    // public function quote()
    // {
    //     return $this->hasOne(Quote::class);
    // }

    // public function ucapans()
    // {
    //     return $this->hasMany(Ucapan::class);
    // }

    // public function fotos()
    // {
    //     return $this->hasMany(Foto::class);
    // }

    // public function videos()
    // {
    //     return $this->hasMany(Video::class);
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class,'user_id','id');
    // }

    // public function paket()
    // {
    //     return $this->belongsTo(Paket::class,'paket_id','id');
    // }

    // public function tema()
    // {
    //     return $this->belongsTo(Tema::class,'tema_id','id');
    // }

    // public function scopeWithWhereHas($query, $relation, $constraint){
    //     return $query->whereHas($relation, $constraint)
    //     ->with([$relation => $constraint]);
    //    }
}
