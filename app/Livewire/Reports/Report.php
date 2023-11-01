<?php

namespace App\Livewire\Reports;

use App\Models\Marzakan;
use App\Models\sardaniakan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Report extends Component
{
    public $filters = [
        'marzakan' => [],
        'karmandakan' => [],
        'sarparshtyarakan' => [],
        'from' => null,
        'to' => null,
        'search' => null,
    ];

    public function updated($property, $value)
    {
        $sarparshtyarakan = [];
        foreach ($this->sarparshtyarakan as $sarparshtyar) {
            if (in_array($sarparshtyar->id, $this->filters['sarparshtyarakan'])) {
                $sarparshtyarakan[] = $sarparshtyar->id;
            }
        }
        $this->filters['sarparshtyarakan'] = $sarparshtyarakan;

        $karmandakan = [];
        foreach ($this->karmandakan as $karmand) {
            if (in_array($karmand->id, $this->filters['karmandakan'])) {
                $karmandakan[] = $karmand->id;
            }
        }
        $this->filters['karmandakan'] = $karmandakan;
    }

    #[Computed]
    public function marzakan()
    {
        if (Gate::allows('superadmin')) {
            return Marzakan::all();
        } else if (Gate::allows('sarparshtyar')) {
            return Marzakan::find(Auth::user()->marz_id);
        }
    }

    #[Computed]
    public function sarparshtyarakan()
    {
        return User::with('rule')
            ->whereHas('rule', fn ($query) => $query->where('rule', 'sarparshtyar'))
            ->whereIn('marz_id', $this->filters['marzakan'])->get();
    }

    #[Computed]
    public function karmandakan()
    {
        $karmandakan = User::query()->with('rule')
            ->whereHas('rule', fn ($query) => $query->where('rule', 'karmand'));

        if (Gate::allows('superadmin')) {
            $karmandakan->whereIn('sarparshtyar_id', $this->filters['sarparshtyarakan']);
        } else if (Gate::allows('sarparshtyar')) {
            $karmandakan->where('sarparshtyar_id', Auth::id());
        }
        return $karmandakan->get();
    }

    #[Computed]
    public function report()
    {
        if (Gate::allows('superadmin')) {
            return sardaniakan::with(['sardanikar', 'karmand'])->filter($this->filters)->paginate(25);
        } else if (Gate::allows('sarparshtyar')) {
            $filters = [
                'karmandakan' => $this->filters['karmandakan'],
                'search' => $this->filters['search'],
                'from' => $this->filters['from'],
                'to' => $this->filters['to'],
            ];
            return sardaniakan::with(['sardanikar', 'karmand'])->filter([
                ...$filters,
                'sarparshtyarakan' => [Auth::id()],
                'marzakan' => [Auth::user()->marz_id],
            ])->paginate(25);
        }
    }

    public function render()
    {
        return view('livewire.reports.report')->extends('layouts.Auth')->section('content');
    }
}
