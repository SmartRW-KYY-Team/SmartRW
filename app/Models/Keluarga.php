<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Keluarga extends Model
{
    use HasFactory;
    protected $table = 'keluarga';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public function rt(): BelongsTo
    {
        return $this->belongsTo(Rt::class, 'rt_id', 'id_rt');
    }
    public function rw(): BelongsTo
    {
        return $this->belongsTo(Rw::class, 'rw_id', 'id_rw');
    }
    public function kepala_keluarga(): HasOne
    {
        return $this->hasOne(User::class, 'id_user', 'kepala_keluarga_id');
    }
}
