<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailKeuanganRW extends Model
{
    use HasFactory;
    protected $table = 'detailKeuanganRW';
    protected $primaryKey = 'id_detailKeuanganRW';

    protected $guarded = [];
    public function rt(): BelongsTo
    {
        return $this->belongsTo(Rt::class, 'rt_id', 'id_rt');
    }
}
