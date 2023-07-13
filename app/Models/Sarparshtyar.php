<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarparshtyar extends Model
{
    use HasFactory;

    public function marz()
    {
        return $this->belongsTo(Marzakan::class, 'marz_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
