<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        return $this->hasOne(Keluarga::class, 'kepala_keluarga', 'id');
    }
    public function rtKetua()
    {
        return $this->hasOne(Rt::class, 'ketua', 'id');
    }
    public function rtSekretaris()
    {
        return $this->hasOne(Rt::class, 'sekretaris', 'id');
    }
    public function rtBendahara()
    {
        return $this->hasOne(Rt::class, 'bendahara', 'id');
    }

    public function rwKetua()
    {
        return $this->hasOne(Rw::class, 'ketua', 'id');
    }

    public function rwSekretaris()
    {
        return $this->hasOne(Rw::class, 'sekretaris', 'id');
    }

    public function rwBendahara()
    {
        return $this->hasOne(Rw::class, 'bendahara', 'id');
    }
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama', 'id');
    }
    public function pemasukanRT()
    {
        return $this->hasMany(PemasukanRT::class, 'user', 'id');
    }
    public function suratDomisili()
    {
        return $this->hasMany(SuratDomisili::class, 'pemohon', 'id');
    }
    public function suratSKTM()
    {
        return $this->hasMany(SuratSKTM::class, 'pemohon', 'id');
    }
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'pengadu', 'id');
    }
}
