<?php

namespace App\Http\Controllers;

use App\Models\Marzakan;
use App\Models\Sarparshtyar;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SarparshtyarController extends Controller
{
    public function index(Request $request)
    {

        $marzakan = Marzakan::all();
        $users = User::whereNotIn('rule_id', [1])->get();

        $sarparshtyarakan = Sarparshtyar::with(['marz','user'])
        ->when(!empty($request->sarparshtyar_name), function (Builder $query) use ($request) {
            $query->whereHas('user', function (Builder $query) use ($request) {
                $query->where('name', 'like', "%{$request->sarparshtyar_name}%");
            });

        })
        ->when(!empty($request->marz_name), function (Builder $query) use ($request) {
            $query->whereHas('marz', function (Builder $query) use ($request) {
                $query->where('name', 'like', "%{$request->marz_name}%");
            });

        })->latest()->paginate(25);

        return view('sarparshtyarakan.sarparshtyarakan', ['marzakan' => $marzakan,'sarparshtyarakan' => $sarparshtyarakan,'users'=>$users]);
    }


    public function addSarparshtyar(Request $request)
    {
        Validator::make($request->all(), [
            'user_id' => ['required', 'integer', Rule::exists('users', 'id'),'different:marz' =>
            Rule::unique('sarparshtyars', 'user_id')->where(function ($query) use ($request) {
                return $query->where(['user_id' => $request->user_id,'marz_id' =>$request->marz]);
            })],
            'phone' => ['required', 'string', 'max:11', Rule::unique('sarparshtyars', 'phone')],
            'marz' => ['required', 'numeric', 'exists:marzakans,id'],
        ], [
            'user_id.unique' => ' ناوی سەرپەرشتیار  بەپێ مەرزەکە دووبارەییە',
        ], [
            'user_id' => '( ناوی سەرپەرشتیار)',
            'phone' => '(ژ.مۆبایل)',
            'marz' => '(مەرز)',
        ])->validate();

        $newSarparshtyar = new Sarparshtyar();
        $newSarparshtyar->marz_id = $request->marz;
        $newSarparshtyar->user_id = $request->user_id;
        $newSarparshtyar->phone = $request->phone;
        if($newSarparshtyar->save()) {
            return redirect()->back()->with('success', 'بەسەرکەوتووی زیادکرا.');
        }
    }

    public function editSarparshtyar($id)
    {
        $marzakan = Marzakan::all();
        $sarparshtyar = Sarparshtyar::with(['marz'])->find($id);
        $users = User::whereNotIn('rule_id', [1])->get();
        return view('sarparshtyarakan.editSarparshtyar', ['marzakan' => $marzakan,'sarparshtyar' => $sarparshtyar,'users'=>$users]);
    }

    public function updateSarparshtyar($id, Request $request)
    {
        $sarparshtyar = Sarparshtyar::where('id', $id)->firstOrFail();
        Validator::make($request->all(), [
            'user_id' => ['required', 'integer', Rule::exists('users', 'id'),'different:marz' =>
            Rule::unique('sarparshtyars', 'user_id')->where(function ($query) use ($request) {
                return $query->where(['user_id' => $request->user_id,'marz_id' =>$request->marz]);
            })->ignore($id)],
            'phone' => ['required', 'string', 'max:11', Rule::unique('sarparshtyars', 'phone')->ignore($id)],
            'marz' => ['required', 'numeric', 'exists:marzakans,id'],
        ], [
            'user_id.unique' => ' ناوی سەرپەرشتیار  بەپێ مەرزەکە دووبارەییە',
        ], [
            'user_id' => '( ناوی سەرپەرشتیار)',
            'phone' => '(ژ.مۆبایل)',
            'marz' => '(مەرز)',
        ])->validate();
        $sarparshtyar->marz_id = $request->marz;
        $sarparshtyar->user_id = $request->user_id;
        $sarparshtyar->phone = $request->phone;
        if($sarparshtyar->save()) {
            return redirect()->route('sarparshtyarakan')->with('success', 'بەسەرکەوتووی نویکرایەوە.');
        }

    }
}
