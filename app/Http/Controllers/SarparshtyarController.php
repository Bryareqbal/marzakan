<?php

namespace App\Http\Controllers;

use App\Models\Marzakan;
use App\Models\Sarparshtyar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SarparshtyarController extends Controller
{
    public function index(Request $request)
    {

        $marzakan = Marzakan::all();

        $sarparshtyarakan = Sarparshtyar::with(['marz'])->when(!empty($request->search), function (Builder $query) use ($request) {
            $query->where('name', 'like', "%{$request->search}%")->orWhere('phone', 'like', "%{$request->search}%")->orWhereHas('marz', function (Builder $query) use ($request) {
                $query->where('name', $request->search);
            });
        })->paginate(25);

        return view('sarparshtyarakan.sarparshtyarakan', [
            'marzakan' => $marzakan,
            'sarparshtyarakan' => $sarparshtyarakan,
        ]);
    }


    public function addSarparshtyar(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11', Rule::unique('sarparshtyars')->where('marz_id', $request->marz)],
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

    public function editSarparshtyar($id)
    {
        $marzakan = Marzakan::all();
        $sarparshtyar = Sarparshtyar::with(['marz'])->find($id);
        return view('sarparshtyarakan.editSarparshtyar', [
            'marzakan' => $marzakan,
            'sarparshtyar' => $sarparshtyar,
        ]);
    }

    public function updateSarparshtyar($id, Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11', Rule::unique('sarparshtyars')->where('marz_id', $request->marz)->ignore($id)],
            'marz' => ['required', 'numeric', 'exists:marzakans,id']
        ]);

        $sarparshtyar = Sarparshtyar::find($id);
        $sarparshtyar->name = $request->name;
        $sarparshtyar->phone = $request->phone;
        $sarparshtyar->marz_id = $request->marz;
        $sarparshtyar->save();

        return redirect()->route('sarparshtyarakan')->with('success', 'بەسەرکەوتووی نویکرایەوە.');
    }
}
