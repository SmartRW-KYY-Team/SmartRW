<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bansos extends Model
{
    use HasFactory;

    protected $table = 'bansos';
    protected $primaryKey = 'id_bansos';
    protected $guarded = [];

    public function keluarga(): HasMany
    {
        return $this->hasMany(User::class, 'id_bansos', 'id_user');
    }
}
