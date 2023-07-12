<?php

namespace App\Http\Controllers;

use App\Models\Karmand;
use App\Models\Sarparshtyar;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KarmandController extends Controller
{
    public function index(Request $request)
    {
        $karmandakan = Karmand::with(['sarparshtyar','user'])->when(!empty($request->sarparshtyar_name), function (Builder $query) use ($request) {
            $query->whereHas('sarparshtyar', function (Builder $query) use ($request) {
                $query->whereHas('user', function (Builder $query) use ($request) {
                    $query->where('name', 'like', "%{$request->sarparshtyar_name}%");
                });
            });

        })->when(!empty($request->karmand_name), function (Builder $query) use ($request) {
            $query->whereHas('user', function (Builder $query) use ($request) {
                $query->where('name', 'like', "%{$request->karmand_name}%");
            });

        })->when(!empty(Auth::user()->rule_id !== 1), function ($query) {
            $query->whereHas('sarparshtyar', function ($query) {
                $query->where('user_id', Auth::id());
            });
        })->latest()->simplePaginate(25);

        $users = User::with('rule', 'karmand')->when(!empty(Auth::user()->rule_id !== 1), function ($query) {
            return   $query->whereNotIn('id', [Auth::id()]);
        })->whereNotIn('rule_id', [1])->get();
        $sarparshtyarkan = Sarparshtyar::with(['user','marz'])->get();
        return view('karmandakan.karmandakan', ['karmandakan'=>$karmandakan,'users'=>$users,'sarparshtyarkan'=>$sarparshtyarkan]);
    }

    public function addNewKarmand(Request $request)
    {
        $sarparshtyar = Sarparshtyar::where('id', $request->sarparshtyar_id)->first();
        $user = User::where('id', $request->user_id)->first();

        Validator::make($request->all(), [
            'sarparshtyar_id'=>['required','integer',Rule::exists('sarparshtyars', 'id'),'different:user_id',
                 Rule::unique('karmands', 'user_id')->where(function ($query) use ($request) {
                     return $query->where(['user_id'=>$request->user_id,'sarparshtyar_id'=>$request->sarparshtyar_id]);
                 }),
           ],
            'user_id'=>['required','integer','max:255',Rule::exists('users', 'id'),Rule::when(($sarparshtyar->user_id === $user->id), ['different:user_id']),
                   Rule::unique('karmands', 'user_id')->where(function ($query) use ($request) {
                       return $query->where(['user_id'=>$request->user_id,'sarparshtyar_id'=>$request->sarparshtyar_id]);
                   })
           ],
            'phone'=>['required','string','digits:11',Rule::unique('Karmands', 'phone')],
          ], [

            'user_id.different' => 'ئەبێت ناوی سەرپەرشتیار و ناوی کارمەند جیاواز بێت',
            'user_id.unique' => 'ناوی کارمەند بەپێ سەرپەرشتیار دووبارەییە',
            ], [
            'sarparshtyar_id'=>'( ناوی سەرپەرشتیار)',
            'user_id'=> '( ناوی کارمەند )',
            'phone'=> '( ژ.مۆبایل  )',
            ])->validate();


        $newKarmand = new Karmand();
        $newKarmand->sarparshtyar_id = $request->sarparshtyar_id;
        // karmand_id
        $newKarmand->user_id = $request->user_id;
        $newKarmand->phone = $request->phone;
        if($newKarmand->save()) {
            return redirect()->back()->with('success', 'بەسەرکەتووی زیادکرا .');
        }
    }

    public function editKarmand(Request $request)
    {
        $karmand = Karmand::with('sarparshtyar')->where('id', $request->id)->firstOrFail();
        $users = User::with('rule', 'karmand')->when(!empty(Auth::user()->rule_id !== 1), function ($query) {
            return   $query->whereNotIn('id', [Auth::id()]);
        })->whereNotIn('rule_id', [1])->get();
        $sarparshtyarkan = Sarparshtyar::with(['user','marz'])->get();
        return view('karmandakan.editKarmand', ['karmand' => $karmand,'users'=>$users,'sarparshtyarkan'=>$sarparshtyarkan]);
    }
    public function saveKarmand(Request $request)
    {
        $editKarmand = Karmand::with('sarparshtyar')->where('id', $request->id)->firstOrFail();

        $sarparshtyar = Sarparshtyar::where('id', $request->sarparshtyar_id)->first();
        $user = User::where('id', $request->user_id)->first();

        Validator::make($request->all(), [
            'sarparshtyar_id'=>['required','integer',Rule::exists('sarparshtyars', 'id'),'different:user_id',
                 Rule::unique('karmands', 'user_id')->where(function ($query) use ($request) {
                     return $query->where(['user_id'=>$request->user_id,'sarparshtyar_id'=>$request->sarparshtyar_id]);
                 })->ignore($editKarmand->id),
           ],
            'user_id'=>['required','integer','max:255',Rule::exists('users', 'id'),Rule::when(($sarparshtyar->user_id === $user->id), ['different:user_id']),
                   Rule::unique('karmands', 'user_id')->where(function ($query) use ($request) {
                       return $query->where(['user_id'=>$request->user_id,'sarparshtyar_id'=>$request->sarparshtyar_id]);
                   })->ignore($editKarmand->id)
           ],
            'phone'=>['required','string','digits:11',Rule::unique('Karmands', 'phone')->ignore($editKarmand->id)],
          ], [

            'user_id.different' => 'ئەبێت ناوی سەرپەرشتیار و ناوی کارمەند جیاواز بێت',
            'user_id.unique' => 'ناوی کارمەند بەپێ سەرپەرشتیار دووبارەییە',
            ], [
            'sarparshtyar_id'=>'( ناوی سەرپەرشتیار)',
            'user_id'=> '( ناوی کارمەند )',
            'phone'=> '( ژ.مۆبایل  )',
            ])->validate();

        $editKarmand->sarparshtyar_id = $request->sarparshtyar_id;
        // karmand_id
        $editKarmand->user_id = $request->user_id;
        $editKarmand->phone = $request->phone;
        if($editKarmand->save()) {
            return redirect()->route('karmandakan')->with('success', 'بەسەرکەتووی نوێکرایەوە .');
        }

    }
}
