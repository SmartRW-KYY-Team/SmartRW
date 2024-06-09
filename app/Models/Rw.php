<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;
    protected $table = 'rw';
    protected $primaryKey = 'id_rw';

    protected $guarded = [];

    public function keluarga()
    {
        return $this->hasMany(Keluarga::class, 'rw_id', 'id_keluarga');
    }
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'rw_id', 'id_pengaduan');
    }
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'rw_id', 'id_kegiatan');
    }
    public function suratDomisili()
    {
        return $this->hasMany(SuratDomisili::class, 'rw_id', 'id_suratDomisili');
    }
    public function suratSKTM()
    {
        return $this->hasMany(SuratSKTM::class, 'rw_id', 'id_suratSKTM');
    }
    public function keuanganRW()
    {
        return $this->hasMany(KeuanganRW::class, 'rw_id', 'id_keuanganRW');
    }
    public function ketuaRW()
    {
        return $this->hasOne(User::class, 'id_user', 'ketua_id');
    }
    public function sekretarisRW()
    {
        return $this->hasOne(User::class, 'id_user', 'sekretaris_id');
    }
    public function bendaharaRW()
    {
        return $this->hasOne(User::class, 'id_user', 'bendahara_id');
    }
}
