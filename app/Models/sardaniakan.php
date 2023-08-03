<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sardaniakan extends Model
{
    use HasFactory;

    public function sardanikar()
    {
        return $this->belongsTo(sardanikar::class);
    }

    public function karmand()
    {
        return $this->belongsTo(User::class, 'karmand_id');
    }
}