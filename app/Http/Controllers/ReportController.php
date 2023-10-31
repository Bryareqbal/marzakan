<?php

namespace App\Http\Controllers;

use App\Models\Karmand;
use App\Models\Marzakan;
use App\Models\sardaniakan;
use App\Models\sardanikar;
use App\Models\Sarparshtyar;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if (Gate::allows('superadmin')) {
            $marzakan = Marzakan::all();
            $sarprshtyarkan =  User::with('rule')
                ->whereHas('rule', fn ($query) => $query->where('rule', 'sarparshtyar'))
                ->whereIn('marz_id', $request->marz ?? [])->get();

            $karmandkan = User::with('rule')
                ->whereHas('rule', fn ($query) => $query->where('rule', 'karmand'))
                ->whereIn('sarparshtyar_id', $request->sarparshtyar ?? [])->get();
            $report = sardaniakan::with(['sardanikar', 'karmand'])->filter($request->only('karmand', 'search', 'sarparshtyar', 'marz', 'from', 'to'));
        } else if (Gate::allows('sarparshtyar')) {

            $marz = Marzakan::where('id', Auth::user()->marz_id)->first();
            $karmandkan = User::with('rule')
                ->whereHas('rule', fn ($query) => $query->where('rule', 'karmand'))
                ->where('sarparshtyar_id', Auth::id())->get();

            $filters = $request->only('karmandakan', 'search', 'from', 'to');
            $report = sardaniakan::with(['sardanikar', 'karmand'])->filter([
                ...$filters,
                'sarparshtyar_id' => Auth::id(),
                'marz_id' => $marz->id,
            ]);
        }


        $request->flash('*');

        return view('Admin.Reports.Report', [
            'reports' => $report->latest()->paginate(25),
            'karmandkan' => $karmandkan,
            'sarprshtyarkan' => $sarprshtyarkan ?? null,
            'marzakan' => $marzakan ?? null,
            'marz' => $marz ?? null,
            'sumPrice' => $report->sum('mount_of_money'),
        ]);
    }
}
