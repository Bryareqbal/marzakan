<?php

namespace App\Http\Controllers;

use App\Models\Karmand;
use App\Models\Marzakan;
use App\Models\sardanikar;
use App\Models\Sarparshtyar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $sumPrice = 0;
        $count_of_sardanikat = 0;
        $karmandkan = Karmand::all();
        $sarprshtyarkan = Sarparshtyar::all();
        $marzakan = Marzakan::all();

        $reports = sardanikar::with(['karmand'])->when(!empty($request->search), function (Builder $query) use ($request) {
            $query->where(function (Builder $query) use ($request) {
                $query->orWhere('name', 'like', "%{$request->search}%")
                       ->orWhere('password_number', 'like', "%{$request->search}%")
                       ->orWhere('phone', 'like', "%{$request->search}%");
            });

        })->when(!empty($request->karmand_id), function (Builder $query) use ($request) {
            $query->whereHas('karmand', function (Builder $query) use ($request) {
                $query->where('id', 'like', "%{$request->karmand_id}%");
            });

        })->when(!empty($request->sarparshtyar_id), function (Builder $query) use ($request) {
            $query->whereHas('karmand', function (Builder $query) use ($request) {
                $query->where('sarparshtyar_id', 'like', "%{$request->sarparshtyar_id}%");
            });

        })->when(!empty($request->marz_id), function (Builder $query) use ($request) {
            $query->whereHas('karmand', function (Builder $query) use ($request) {
                $query->whereHas('sarparshtyar', function (Builder $query) use ($request) {
                    $query->where('marz_id', 'like', "%{$request->marz_id}%");

                });
            });

        })->when(!empty($request->created_at), function (Builder $query) use ($request) {
            $query->where('created_at', 'like', "%{$request->created_at}%");
        })

        ->latest()->paginate(25);
        $request->flash('*');

        foreach($reports as $key => $report) {
            $sumPrice += $report->mount_of_money;
        }
        $count_of_sardanikat += $reports->count('id');
        return view('Admin.Reports.Report', [
                'reports' => $reports,
                'karmandkan'=>$karmandkan,
                'sarprshtyarkan'=>$sarprshtyarkan,
                'marzakan'=>$marzakan,
                'sumPrice'=>$sumPrice,
                'count_of_sardanikat'=>$count_of_sardanikat
        ]);
    }

}
