<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vector extends Model
{
    use HasFactory;

    public $guarded = false;

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
