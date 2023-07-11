<?php

namespace App\Http\Controllers;

use App\Models\Karmand;
use App\Models\Rule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KarmandController extends Controller
{
    public function index(Request $request)
    {
        $marzakan = Karmand::when(!empty($request->name), function (Builder $query) use ($request) {
            $query->where('name', 'like', "%{$request->name}%");
        })->when($request->address, function (Builder $query) use ($request) {
            $query->where('phone', 'like', "%{$request->address}%");
        })->latest()->simplePaginate(12);

        return view('marzakan.marzakan', ['marzakan'=>$marzakan]);
    }

    public function addNewMarzakan(Request $request)
    {
        Validator::make($request->all(), [
            'name'=>['required','string','max:255',Rule::unique('Karmands', 'name')->ignore($request->id)],
            'phone'=>['required','string','max:255'],
        ], [], [
            'name'=> '( ناو )',
            'phone'=> '( ژ.مۆبایل  )',
            ])->validate();


        $newKarmand = new Karmand();
        $newKarmand->name = $request->name;
        $newKarmand->address = $request->address;
        if($newKarmand->save()) {
            return redirect()->back()->with('success', 'بەسەرکەتووی زیادکرا .');
        }
    }

    public function editMarzakan(Request $request)
    {
        $user = Karmand::where('id', $request->id)->firstOrFail();
        return view('marzakan.editMarzakan', ['user' => $user]);
    }
    public function saveMarzakan(Request $request)
    {
        Validator::make($request->all(), [
            'name'=>['required','string','max:255',Rule::unique('Karmands', 'name')->ignore($request->id)],
            'phone'=>['required','string','max:255'],
        ], [], [
            'name'=> '( ناو )',
            'phone'=> '( ژ.مۆبایل  )',
            ])->validate();

        $newKarmand = Karmand::where('id', $request->id)->firstOrFail();
        $newKarmand->name = $request->name;
        $newKarmand->address = $request->address;
        if($newKarmand->save()) {
            return redirect()->back()->with('success', 'بەسەرکەتووی گۆردرا .');
        }

    }
}
