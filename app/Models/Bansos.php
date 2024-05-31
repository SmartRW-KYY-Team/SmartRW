<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bansos extends Model
{
    use HasFactory;

    protected $table = 'bansos';
    protected $primaryKey = 'id_bansos';
    protected $guarded = [];

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(User::class, 'keluarga_id', 'id_user');
    }
}
