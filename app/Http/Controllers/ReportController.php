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
        $karmandkan = Karmand::all();
        $sarprshtyarkan = Sarparshtyar::all();
        $marzakan = Marzakan::all();



        $query = sardanikar::with(['karmand','sarparshtyar.user'])->when(!empty($request->search), function (Builder $query) use ($request) {
            $query->where(function (Builder $query) use ($request) {
                $query->orWhere('name', 'like', "%{$request->search}%")
                       ->orWhere('passport_number', 'like', "%{$request->search}%")
                       ->orWhere('phone', 'like', "%{$request->search}%");
            });

        })->when(!empty($request->karmand_id), function (Builder $query) use ($request) {
            $query->whereHas('karmand', function (Builder $query) use ($request) {
                $query->where('id', 'like', "%{$request->karmand_id}%");
            });

        })->when(!empty($request->sarparshtyar_id), function (Builder $query) use ($request) {
            $query->whereHas('sarparshtyar', function (Builder $query) use ($request) {
                $query->where('user_id', 'like', "%{$request->sarparshtyar_id}%");

            });

        })->when(!empty($request->marz_id), function (Builder $query) use ($request) {
            $query->whereHas('sarparshtyar', function (Builder $query) use ($request) {
                $query->where('marz_id', 'like', "%{$request->marz_id}%");
            });

        })->when(!empty($request->created_at), function (Builder $query) use ($request) {
            $query->where('created_at', 'like', "%{$request->created_at}%");
        });

        $request->flash('*');

        return view('Admin.Reports.Report', [
                'reports' => $query->latest()->paginate(25),
                'karmandkan'=>$karmandkan,
                'sarprshtyarkan'=>$sarprshtyarkan,
                'marzakan'=>$marzakan,
                'sumPrice'=>$query->sum('mount_of_money'),
        ]);
    }

}
