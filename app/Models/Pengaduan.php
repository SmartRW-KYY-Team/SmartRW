<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';

    protected $guarded = [];
    public function rt(): BelongsTo
    {
        return $this->belongsTo(Rt::class, 'rt_id', 'id_rt');
    }
    public function rw(): BelongsTo
    {
        return $this->belongsTo(Rw::class, 'rw_id', 'id_rw');
    }
    public function pengadu(): BelongsTo
    {
        return $this->belongsto(User::class, 'pengadu_id', 'id_user');
    }
}
