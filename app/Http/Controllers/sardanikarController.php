<?php

namespace App\Http\Controllers;

use App\Models\sardaniakan;
use App\Models\sardanikar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class sardanikarController extends Controller
{

    public function index()
    {
        return view('sardanikar.index');
    }

    public function addSardanikar(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255'],
            'passport_number' => ['required', 'string', 'max:255', 'unique:sardanikars,passport_number'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', 'boolean'],
            'nation' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11', 'min:11'],
            'img' => ['required', 'file', 'image', 'max:2048'],
            'nation' => ['required', 'string', 'max:255'],
            'issuing_authority' => ['required', 'string', 'max:255']
        ], [], [
            'name' => '(ناو)',
            'nickname' => '(نازناو)',
            'passport_number' => '(ژمارەی پاسپۆرت)',
            'birth_date' => '(بەرواری لەدایکبوون)',
            'gender' => '(ڕەگەز)',
            'nation' => '(نەتەوە)',
            'phone' => '(ژ.مۆبایل)',
            'img' => '(وێنە)',
            'nation' => '(نەتەوە)',
            'issuing_authority' => '(دەسەڵاتی دەرکردن)',
        ])->validate();


        $newSardanikar = new sardanikar();


        $newSardanikar->name = $request->name;
        $newSardanikar->nickname = $request->nickname;
        $newSardanikar->passport_number = Str::upper($request->passport_number);
        $newSardanikar->birth_date = $request->birth_date;
        $newSardanikar->gender = $request->gender;
        $newSardanikar->nation = $request->nation;
        $newSardanikar->phone = $request->phone;
        $newSardanikar->nation = $request->nation;
        $newSardanikar->issuing_authority = $request->issuing_authority;
        if ($request->hasFile('img')) {
            $newSardanikar->img = Storage::disk('public')->put('sardanikar', $request->img);
        }
        $newSardanikar->save();

        return redirect()->back()->with('success', 'بەسەرکەوتووی تۆمار کرا');
    }

    public function editSardanikar($id)
    {
        $sardanikar = sardanikar::find($id);
        return view('sardanikar.editSardanikar', [
            "sardanikar" => $sardanikar,
        ]);
    }

    public function updateSardanikar($id, Request $request)
    {
        Validator::make($request->all(), [
            "name" => ['required', 'string', 'max:255'],
            "nickname" => ['nullable', 'string', 'max:255'],
            "passport_number" => ['required', 'string', 'max:255'],
            "birth_date" => ['required', 'date'],
            "gender" => ['required', 'boolean'],
            "nation" => ['required', 'string', 'max:255'],
            "phone" => ['required', 'min:11', 'max:11'],
            "image" => ['nullable', 'file', 'image'],
            "passport_expire_date" => ['nullable', 'date'],
            "issuing_authority" => ['nullable', 'string', 'max:255'],
        ], [], [
            "name" => '(ناو)',
            "nickname" => '(نازناو)',
            "passport_number" => '(ژ.پاسپۆرت)',
            "birth_date" => '(رۆژی لەدایکبوون)',
            "gender" => '(ڕەگەز)',
            "nation" => '(نەتەوە)',
            "phone" => '(ژ.مۆبایل)',
            "image" => '(وێنە)',
            "passport_expire_date" => '(بەرواری بەسەرچوونی پاسپۆرت)',
            "issuing_authority" => '(دەسەڵاتی دەرکردن)',
        ])->validate();

        $sardanikar = sardanikar::find($id);
        $sardanikar->name = $request->name;
        $sardanikar->nickname = $request->nickname;
        $sardanikar->passport_number = $request->passport_number;
        $sardanikar->birth_date = $request->birth_date;
        $sardanikar->gender = $request->gender;
        $sardanikar->nation = $request->nation;
        $sardanikar->phone = $request->phone;
        $sardanikar->passport_expire_date = $request->passport_expire_date;
        $sardanikar->issuing_authority = $request->issuing_authority;

        if ($request->hasFile('image')) {

            if (Storage::fileExists($sardanikar->img)) {
                Storage::delete($sardanikar->img);
            }
            $sardanikar->img = Storage::disk('public')->put('sardanikar/', $request->file('image'));
        }
        $sardanikar->save();
        return redirect()->back()->with('success', 'بەسەرکەوتووی گۆڕدرا.')->with('id', $sardanikar->id);
    }

    public function showSardanikaran(Request $request)
    {

        $sardanikaran = sardanikar::when(!empty($request->search), function (Builder $query) use ($request) {
            $query->where('name', 'like', "%{$request->search}%");
        })->paginate(25);

        $request->flash();
        return view('sardanikar.showSardanikaran', [
            'sardanikaran' => $sardanikaran,
        ]);
    }
}
