<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $primaryKey = 'id_user';
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function keluarga()
    {
        return $this->hasOne(Keluarga::class, 'id_keluarga', 'keluarga_id');
    }
    public function rtKetua()
    {
        return $this->hasOne(Rt::class, 'ketua_id', 'id_user');
    }
    public function rtSekretaris()
    {
        return $this->hasOne(Rt::class, 'sekretaris_id', 'id_user');
    }
    public function rtBendahara()
    {
        return $this->hasOne(Rt::class, 'bendahara_id', 'id_user');
    }

    public function ketuaRW()
    {
        return $this->hasOne(Rw::class, 'id_user', 'ketua_id');
    }

    public function sekretarisRW()
    {
        return $this->hasOne(Rw::class, 'id_user', 'sekretaris_id');
    }

    public function bendaharaRW()
    {
        return $this->hasOne(Rw::class, 'id_user', 'bendahara_id');
    }
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id', 'id_agama');
    }
    public function suratDomisili()
    {
        return $this->hasMany(SuratDomisili::class, 'pemohon_id', 'id_suratDomisili');
    }
    public function suratSKTM()
    {
        return $this->hasMany(SuratSKTM::class, 'pemohon_id', 'id_suratSKTM');
    }
    public function pengaduan(): HasMany
    {
        return $this->hasMany(Pengaduan::class, 'pengadu_id', 'id_pengaduan');
    }

    public function pemohon()
    {
        return $this->hasMany(Pengaduan::class, 'pemohon_id', 'id_pemohon');
    }
}
