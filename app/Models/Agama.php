<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agama extends Model
{
    use HasFactory;
    protected $table = 'agama';
    protected $primaryKey = 'id_agama';

    protected $guarded = [];

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'agama_id', 'id_user');
    }
}
