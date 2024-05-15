<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratDomisili extends Model
{
    use HasFactory;
    protected $table = 'suratDomisili';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public function rw(): BelongsTo
    {
        return $this->belongsTo(RT::class, 'rw_id', 'id_rw');
    }
    public function rt(): BelongsTo
    {
        return $this->belongsTo(RT::class, 'rt_id', 'id_rt');
    }
}
