<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KeuanganRT extends Model
{
    use HasFactory;
    protected $table = 'keuanganRT';
    protected $primaryKey = 'id_keuanganRT';

    protected $guarded = [];
    public function rt(): BelongsTo
    {
        return $this->belongsTo(Rt::class, 'rt_id', 'id_rt');
    }
}
