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
    public function pemasukanRT()
    {
        return $this->hasMany(PemasukanRT::class, 'rt_id', 'id_pemasukanRT');
    }
    public function pengeluaranRT()
    {
        return $this->hasMany(PengeluaranRT::class, 'rt_id', 'id_pengeluaranRT');
    }
    public function ketuaRT()
    {
        return $this->hasOne(User::class);
    }
    public function sekretarisRT()
    {
        return $this->hasOne(User::class);
    }
    public function bendaharaRT()
    {
        return $this->hasOne(User::class);
    }
}
