<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    use HasFactory;
    protected $table = 'rt';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public function keluarga()
    {
        return $this->hasMany(Keluarga::class, 'rt', 'id');
    }
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'rt', 'id');
    }
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'rt', 'id');
    }
    public function suratDomisili()
    {
        return $this->hasMany(SuratDomisili::class, 'rt', 'id');
    }
    public function suratSKTM()
    {
        return $this->hasMany(SuratSKTM::class, 'rt', 'id');
    }
    public function pemasukanRT()
    {
        return $this->hasMany(PemasukanRT::class, 'rt', 'id');
    }
    public function pengeluaranRT()
    {
        return $this->hasMany(PengeluaranRT::class, 'rt', 'id');
    }
}
