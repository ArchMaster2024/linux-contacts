<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    /**
     * Datos que podran ser llenados
     */
    protected $fillable = [
        'name',
        'direction',
        'phone',
        'email',
        'photo_path',
        'user_id'
    ];

    /**
     * Obtener al usuario que posee este contacto
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
