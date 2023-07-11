<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karmand extends Model
{
    use HasFactory;

    public function sarparshtyar()
    {
        return $this->belongsTo(Sarparshtyar::class, 'sarparshtyar_id');
    }
}
