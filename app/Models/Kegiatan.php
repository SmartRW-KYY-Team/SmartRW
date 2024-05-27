<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $guarded = [];

    public function rt(): BelongsTo
    {
        return $this->belongsTo(Rt::class, 'rt_id', 'id_rt');
    }
    public function rw(): BelongsTo
    {
        return $this->belongsTo(Rw::class, 'rw_id', 'id_rw');
    }
    protected function lampiran(): Attribute
    {
        return Attribute::make(
            get: fn ($lampiran) => url('/storage/kegiatan/' . $lampiran),
        );
    }
}
