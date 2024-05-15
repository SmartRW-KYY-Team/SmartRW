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
        return $this->belongsTo(RT::class, 'rt', 'id');
    }
    public function rw(): BelongsTo
    {
        return $this->belongsTo(RT::class, 'rt', 'id');
    }
    public function kepala_keluarga_relation(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'kepala_keluarga');
    }
}
