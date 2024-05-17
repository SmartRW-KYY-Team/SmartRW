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
    public function pemasukanRW()
    {
        return $this->hasMany(PemasukanRW::class, 'rw_id', 'id_pemasukanRW');
    }
    public function pengeluaranRW()
    {
        return $this->hasMany(PengeluaranRW::class, 'rw_id', 'id_pengeluaranRW');
    }
    public function ketuaRW()
    {
        return $this->hasOne(User::class);
    }
    public function sekretarisRW()
    {
        return $this->hasOne(User::class);
    }
    public function bendaharaRW()
    {
        return $this->hasOne(User::class);
    }
}
