<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    // ---------------------- scopes

    public function scopeFilter(Builder $query, $filters)
    {
        $query->when(!empty($filters['search']), function (Builder $query) use ($filters) {
            $query->whereHas('sardanikar', function (Builder $query) use ($filters) {
                $query->where('name', 'like', "%{$filters['search']}%")
                    ->orWhere('passport_number', 'like', "%{$filters['search']}%")
                    ->orWhere('phone', 'like', "%{$filters['search']}%");
            });
        })->when(!empty($filters['karmand']), function (Builder $query) use ($filters) {
            $query->whereHas('karmand', function (Builder $query) use ($filters) {
                $query->whereIn('id', $filters['karmand'] ?? null);
            });
        })->when(!empty($filters['sarparshtyar']), function (Builder $query) use ($filters) {
            $query->whereHas('karmand', function (Builder $query) use ($filters) {
                $query->whereHas('sarparshtyar', function (Builder $query) use ($filters) {
                    $query->whereIn('id', $filters['sarparshtyar'] ?? null);
                });
            });
        })->when(!empty($filters['marz']), function (Builder $query) use ($filters) {
            $query->whereHas('karmand.sarparshtyar.marz', function (Builder $query) use ($filters) {
                $query->whereIn('id', $filters['marz']);
            });
        })->when(!empty($filters['from']) && !empty($filters['to']), function (Builder $query) use ($filters) {
            $query->whereDate('created_at', '>=', $filters['from'])->whereDate('created_at', '<=', $filters['to']);
        });
    }
}
