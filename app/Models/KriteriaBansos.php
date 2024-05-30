<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaBansos extends Model
{
    use HasFactory;
    protected $table = 'kriteria_bansos';
    protected $primaryKey = 'id_kriteria_bansos';
    protected $guarded = [];
}
