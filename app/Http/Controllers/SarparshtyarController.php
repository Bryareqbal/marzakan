<?php

namespace App\Http\Controllers;

use App\Models\Marzakan;
use App\Models\Sarparshtyar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SarparshtyarController extends Controller
{
    public function index()
    {

        $marzakan = Marzakan::all();

        $sarparshtyarakan = Sarparshtyar::with(['marz'])->paginate(25);
        return view('sarparshtyarakan.sarparshtyarakan', [
            'marzakan' => $marzakan,
            'sarparshtyarakan' => $sarparshtyarakan,
        ]);
    }

    public function addSarparshtyar(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:sarparshtyars,name'],
            'phone' => ['required', 'string', 'max:11', 'unique:sarparshtyars,phone'],
            'marz' => ['required', 'numeric', 'exists:marzakans,id'],
        ], [], [
            'name' => '(ناو)',
            'phone' => '(ژ.مۆبایل)',
            'marz' => '(مەرز)',
        ])->validate();

        $newSarparshtyar = new Sarparshtyar();
        $newSarparshtyar->name = $request->name;
        $newSarparshtyar->phone = $request->phone;
        $newSarparshtyar->marz_id = $request->marz;
        $newSarparshtyar->save();

        return redirect()->back()->with('success', 'بەسەرکەوتووی زیادکرا.');
    }
}
