<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Keluarga extends Model
{
    use HasFactory;
    protected $table = 'keluarga';
    protected $primaryKey = 'id';

    protected $guarded = [];

    /**
     * Define relationship with User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kepalaKeluarga(): BelongsTo
    {
        // Mendefinisikan relasi bahwa satu keluarga dimiliki oleh satu user (kepala keluarga)
        return $this->belongsTo(User::class, 'kepala_keluarga', 'id');
    }

    /**
     * Define relationship with RT model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rt()
    {
        // Mendefinisikan relasi bahwa satu keluarga terkait dengan satu RT
        return $this->belongsTo(RT::class, 'rt', 'id');
    }

    /**
     * Define relationship with RW model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rw()
    {
        // Mendefinisikan relasi bahwa satu keluarga terkait dengan satu RW
        return $this->belongsTo(RW::class, 'rw', 'id');
    }
}
