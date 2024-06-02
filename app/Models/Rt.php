<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    use HasFactory;
    protected $table = 'rt';
    protected $primaryKey = 'id_rt';

    protected $guarded = [];
    public function keluarga()
    {
        return $this->hasMany(Keluarga::class, 'rt_id', 'id_keluarga');
    }
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'rt_id', 'id_pengaduan');
    }
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'rt_id', 'id_kegiatan');
    }
    public function suratDomisili()
    {
        return $this->hasMany(SuratDomisili::class, 'rt_id', 'id_suratDomisili');
    }
    public function suratSKTM()
    {
        return $this->hasMany(SuratSKTM::class, 'rt_id', 'id_suratSKTM');
    }
    public function detailKeuanganRT()
    {
        return $this->hasMany(DetailKeuanganRT::class, 'rt_id', 'id_detailKeuanganRT');
    }
    public function keuanganRT()
    {
        return $this->hasMany(KeuanganRT::class, 'rt_id', 'id_keuanganRT');
    }
    public function ketuaRT()
    {
        return $this->belongsTo(User::class, 'ketua_id', 'id_user');
    }
    public function sekretarisRT()
    {
        return $this->belongsTo(User::class, 'sekretaris_id', 'id_user');
    }
    public function bendaharaRT()
    {
        return $this->belongsTo(User::class, 'bendahara_id', 'id_user');
    }
}
