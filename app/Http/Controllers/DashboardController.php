<?php

namespace App\Http\Controllers;

use App\Models\Karmand;
use App\Models\Marzakan;
use App\Models\sardanikar;
use App\Models\Sarparshtyar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $countusers = User::count();
        $countMarzakan = Marzakan::count();
        $countSarparshtyar = Sarparshtyar::count();
        $countKarmandkan = Karmand::count();
        $countSardanikar = sardanikar::where('karmand_id', Auth::id())->count();
        return view(
            'dashboard',
            ['countusers' => $countusers,'countMarzakan' => $countMarzakan,
                  'countSarparshtyar' => $countSarparshtyar,
                  'countKarmandkan' => $countKarmandkan,
                  'countSardanikar' => $countSardanikar]
        );
    }


}
