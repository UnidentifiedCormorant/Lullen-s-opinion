<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stage extends Model
{
    use HasFactory;

    public $guarded = false;

    /**
     * Возвращает векторы для этой стадии
     *
     * @return HasMany
     */
    public function vectors(): HasMany
    {
        return $this->hasMany(Vector::class);
    }
}
