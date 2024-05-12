<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role';
    protected $primaryKey = 'id';

    protected $guarded = [];

    public function administator(): HasMany
    {
        return $this->hasMany(Administrator::class, 'id', 'id');
    }
}
