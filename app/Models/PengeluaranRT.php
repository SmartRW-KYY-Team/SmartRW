<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengeluaranRT extends Model
{
    use HasFactory;
    protected $table = 'pengeluaranRT';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public function rw(): BelongsTo
    {
        return $this->belongsTo(Rt::class, 'rw_id', 'id_rw');
    }
    public function rt(): BelongsTo
    {
        return $this->belongsTo(Rw::class, 'rt_id', 'id_rt');
    }
}
