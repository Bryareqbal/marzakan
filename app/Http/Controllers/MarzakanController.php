<?php

namespace App\Http\Controllers;

use App\Models\Marzakan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MarzakanController extends Controller
{
    public function index(Request $request)
    {
        $marzakan = Marzakan::when(!empty($request->name), function (Builder $query) use ($request) {
            $query->where('name', 'like', "%{$request->name}%");
        })->when($request->address, function (Builder $query) use ($request) {
            $query->where('address', 'like', "%{$request->address}%");
        })->latest()->simplePaginate(25);

        return view('marzakan.marzakan', ['marzakan'=>$marzakan]);
    }

    public function addNewMarzakan(Request $request)
    {
        Validator::make($request->all(), [
            'name'=>['required','string','max:255',Rule::unique('marzakans', 'name')],
            'address'=>['required','string','max:255'],
        ], [], [
            'name'=> '( ناوی مەرز )',
            'address'=> '( ناونیشان  )',
            ])->validate();

        $newMarzakan = new Marzakan();
        $newMarzakan->name = $request->name;
        $newMarzakan->address = $request->address;
        if($newMarzakan->save()) {
            return redirect()->back()->with('success', 'بەسەرکەتووی زیادکرا .');
        }
    }

    public function editMarzakan(Request $request)
    {
        $user = Marzakan::where('id', $request->id)->firstOrFail();
        return view('marzakan.editMarzakan', ['user' => $user]);
    }
    public function saveMarzakan(Request $request)
    {
        $editMarzakan = Marzakan::where('id', $request->id)->firstOrFail();
        Validator::make($request->all(), [
            'name'=>['required','string','max:255',Rule::unique('marzakans', 'name')->ignore($editMarzakan->id)],
            'address'=>['required','string','max:255'],
        ], [], [
            'name'=> '( ناوی مەرز )',
            'address'=> '( ناونیشان  )',
            ])->validate();

        $editMarzakan->name = $request->name;
        $editMarzakan->address = $request->address;
        if($editMarzakan->save()) {
            return redirect()->route('marzakan')->with('success', 'بەسەرکەتووی نوێکرایەوە .');
        }

    }


}
