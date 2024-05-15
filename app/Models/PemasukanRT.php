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
        return $this->belongsTo(Rt::class, 'rt_id', 'id_rt');
    }
    public function rw(): BelongsTo
    {
        return $this->belongsTo(Rt::class, 'rw_id', 'id_rw');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
