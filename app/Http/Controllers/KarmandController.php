<?php

namespace App\Http\Controllers;

use App\Models\Karmand;
use App\Models\Sarparshtyar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KarmandController extends Controller
{
    public function index(Request $request)
    {
        $karmandakan = Karmand::when(!empty($request->name), function (Builder $query) use ($request) {
            $query->where('name', 'like', "%{$request->name}%");
        })->when($request->phone, function (Builder $query) use ($request) {
            $query->where('phone', 'like', "%{$request->phone}%");
        })->latest()->simplePaginate(12);

        $sarparshtyarakan = Sarparshtyar::latest()->get();
        return view('karmandakan.karmandakan', ['karmandakan'=>$karmandakan,'sarparshtyarakan'=>$sarparshtyarakan]);
    }

    public function addNewKarmand(Request $request)
    {
        Validator::make($request->all(), [
            'sarparshtyar_id'=>['required','integer',Rule::exists('sarparshtyars', 'id'),
            Rule::unique('karmands', 'sarparshtyar_id')->where(function ($query) use ($request) {
                return $query->where(['sarparshtyar_id'=>$request->sarparshtyar_id,'phone'=>$request->phone]);
            })
        ],
            'name'=>['required','string','max:255'],
            'phone'=>['required','string','digits:11',Rule::unique('Karmands', 'phone')],
        ], [], [
            'sarparshtyar_id'=>'( ناوی سەرپەرشتیار)',
            'name'=> '( ناوی کارمەند )',
            'phone'=> '( ژ.مۆبایل  )',
            ])->validate();


        $newKarmand = new Karmand();
        $newKarmand->sarparshtyar_id = $request->sarparshtyar_id;
        $newKarmand->name = $request->name;
        $newKarmand->phone = $request->phone;
        if($newKarmand->save()) {
            return redirect()->back()->with('success', 'بەسەرکەتووی زیادکرا .');
        }
    }

    public function editKarmand(Request $request)
    {
        $karmand = Karmand::with('sarparshtyar')->where('id', $request->id)->firstOrFail();
        $sarparshtyarakan = Sarparshtyar::latest()->get();
        return view('karmandakan.editKarmand', ['karmand' => $karmand,'sarparshtyarakan'=>$sarparshtyarakan]);
    }
    public function saveKarmand(Request $request)
    {
        $editKarmand = Karmand::with('sarparshtyar')->where('id', $request->id)->firstOrFail();
        Validator::make($request->all(), [
            'sarparshtyar_id'=>['required','integer',Rule::exists('sarparshtyars', 'id'),
              Rule::unique('karmands', 'sarparshtyar_id')->where(function ($query) use ($request) {
                  return $query->where(['sarparshtyar_id'=>$request->sarparshtyar_id,'phone'=>$request->phone]);
              })->ignore($editKarmand->id)
        ],
            'name'=>['required','string','max:255'],
            'phone'=>['required','string','digits:11',Rule::unique('Karmands', 'phone')->ignore($editKarmand->id)],
        ], [], [
              'sarparshtyar_id'=>'( ناوی سەرپەرشتیار)',
              'name'=> '( ناوی کارمەند )',
              'phone'=> '( ژ.مۆبایل  )',
        ])->validate();

        $editKarmand->sarparshtyar_id = $request->sarparshtyar_id;
        $editKarmand->name = $request->name;
        $editKarmand->phone = $request->phone;
        if($editKarmand->save()) {
            return redirect()->route('karmandakan')->with('success', 'بەسەرکەتووی گۆردرا .');
        }

    }
}
