<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PemasukanRT extends Model
{
    use HasFactory;
    protected $table = 'pemasukanRT';
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
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
