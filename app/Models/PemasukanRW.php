<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PemasukanRW extends Model
{
    use HasFactory;
    protected $table = 'pemasukanRW';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public function rw(): BelongsTo
    {
        return $this->belongsTo(RT::class, 'rt', 'id');
    }
    public function rt(): BelongsTo
    {
        return $this->belongsTo(RT::class, 'rt', 'id');
    }
}
