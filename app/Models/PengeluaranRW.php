<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengeluaranRW extends Model
{
    use HasFactory;
    protected $table = 'pengeluaranRW';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public function rw(): BelongsTo
    {
        return $this->belongsTo(Rw::class, 'rw_id', 'id_rw');
    }
}
