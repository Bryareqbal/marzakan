<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sardanikar extends Model
{
    use HasFactory;

    protected $casts = [
        'mount_of_money' => 'float'
    ];

    public function karmand()
    {
        return $this->belongsTo(User::class, 'karmand_id');
    }
    public function sarparshtyar()
    {
        return $this->belongsTo(Sarparshtyar::class, 'sarparshtyar_id');
    }



    // protected function img(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (mixed $value, array $attributes) => 'storage/' . $value
    //     );
    // }
}
