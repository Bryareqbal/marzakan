<?php

namespace App\Http\Controllers;

use App\Models\Karmand;
use App\Models\Marzakan;
use App\Models\sardaniakan;
use App\Models\sardanikar;
use App\Models\Sarparshtyar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $karmandkan = Karmand::all();
        $sarprshtyarkan = Sarparshtyar::all();
        $marzakan = Marzakan::all();



        $report = sardaniakan::with(['sardanikar'])->when(!empty($request->search), function (Builder $query) use ($request) {
            $query->where(function (Builder $query) use ($request) {
                $query->where('name', 'like', "%{$request->search}%")
                    ->orWhere('passport_number', 'like', "%{$request->search}%")
                    ->orWhere('phone', 'like', "%{$request->search}%");
            });
        })->when(!empty($request->karmand_id), function (Builder $query) use ($request) {
            $query->whereHas('karmand', function (Builder $query) use ($request) {
                $query->where('id', $request->karmand_id);
            });
        })->when(!empty($request->sarparshtyar_id), function (Builder $query) use ($request) {
            $query->whereHas('karmand', function (Builder $query) use ($request) {
                $query->whereHas('sarparshtyar', function (Builder $query) use ($request) {
                    $query->where('id', $request->sarparshtyar_id);
                });
            });
        })->when(!empty($request->marz_id), function (Builder $query) use ($request) {
            $query->whereHas('karmand.sarparshtyar.marz', function (Builder $query) use ($request) {
                $query->where('id', $request->marz_id);
            });
        })->when(!empty($request->from) && !empty($request->to), function (Builder $query) use ($request) {
            $query->whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to);
        });

        $request->flash('*');

        return view('Admin.Reports.Report', [
            'reports' => $report->latest()->paginate(25),
            'karmandkan' => $karmandkan,
            'sarprshtyarkan' => $sarprshtyarkan,
            'marzakan' => $marzakan,
            'sumPrice' => $report->sum('mount_of_money'),
        ]);
    }
}
