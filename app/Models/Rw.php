<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;
    protected $table = 'rw';
    protected $primaryKey = 'id';

    protected $guarded = [];

    public function keluarga()
    {
        return $this->hasMany(Keluarga::class, 'rw', 'id');
    }
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'rw', 'id');
    }
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'rw', 'id');
    }
    public function suratDomisili()
    {
        return $this->hasMany(SuratDomisili::class, 'rw', 'id');
    }
    public function suratSKTM()
    {
        return $this->hasMany(SuratSKTM::class, 'rw', 'id');
    }
    public function pemasukanRW()
    {
        return $this->hasMany(PemasukanRW::class, 'rw', 'id');
    }
    public function pengeluaranRW()
    {
        return $this->hasMany(PengeluaranRW::class, 'rw', 'id');
    }
}
