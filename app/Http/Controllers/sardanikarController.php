<?php

namespace App\Http\Controllers;

use App\Models\Karmand;
use App\Models\sardanikar;
use App\Models\Sarparshtyar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class sardanikarController extends Controller
{
    public function index()
    {
        $totalMoney = sardanikar::where('karmand_id', Auth::id())->sum('mount_of_money');
        $counter = sardanikar::where('karmand_id', Auth::id())->count();
        return view('sardanikar.sardanikar', [
            'totalMoney' => $totalMoney,
            'counter' => $counter,
        ]);
    }

    public function addSardanikar(Request $request)
    {
        // dd("slaw");

        Validator::make($request->all(), [
            "name" => ['required', 'string', 'max:255'],
            "nickname" => ['nullable', 'string', 'max:255'],
            "passport_number" => ['required', 'string'],
            "birth_date" => ['required', 'date'],
            "gender" => ['required', 'boolean'],
            "nation" => ['required', 'string', 'max:255'],
            "phone" => ['required', 'min:11', 'max:11'],
            "purpose_of_coming" => ['required', 'string'],
            "address" => ['required', 'string'],
            "img" => ['nullable', 'file', 'image'],
            "status" => ['required', Rule::in(['coming', 'leaving'])],
            "mount_of_money" => ['required', Rule::in(['free', 5000, 10000])],
            "targeted_person" => ['required', 'string', 'max:255'],
            "no_of_visitors" => ['nullable', 'numeric', 'min:0'],
            "passport_expire_date" => ['required', 'date'],
            "issuing_authority" => ['required', 'string','max:255'],
        ], [], [
            "name" => '(ناو)',
            "nickname" => '(نازناو)',
            "passport_number" => '(ژ.پاسپۆرت)',
            "birth_date" => '(رۆژی لەدایکبوون)',
            "gender" => '(ڕەگەز)',
            "nation" => '(نەتەوە)',
            "phone" => '(ژ.مۆبایل)',
            "purpose_of_coming" => '(هۆکاری هاتن)',
            "address" => '(ناونیشانی شوێنی مانەوە)',
            "img" => '(وێنە)',
            "status" => '(حاڵەت)',
            "mount_of_money" => '(بری پارە)',
            "targeted_person" => '(ناوی ئەو کەسەی دەچێتە لای)',
            "no_of_visitors" => '(ژمارەی سەردانیکەران)',
            "passport_expire_date" => '(بەرواری بەسەرچوونی پاسپۆرت)',
            "issuing_authority" => '(دەسەڵاتی دەرکردن)',
        ])->validate();

        $sarparshtyar = Karmand::with(['user', 'sarparshtyar.user'])->where('user_id', Auth::id())->first();
        $newSardanikar = new sardanikar();
        $newSardanikar->name = $request->name;
        $newSardanikar->nickname = $request->nickname;
        $newSardanikar->passport_number = $request->passport_number;
        $newSardanikar->birth_date = $request->birth_date;
        $newSardanikar->gender = $request->gender;
        $newSardanikar->nation = $request->nation;
        $newSardanikar->phone = $request->phone;
        $newSardanikar->purpose_of_coming = $request->purpose_of_coming;
        $newSardanikar->address = $request->address;
        $newSardanikar->img = $request->img;
        $newSardanikar->status = $request->status;
        $newSardanikar->mount_of_money = $request->mount_of_money === 'free' ? 0 : $request->mount_of_money;
        $newSardanikar->targeted_person = $request->targeted_person;
        $newSardanikar->no_of_visitors = $request->no_of_visitors;
        $newSardanikar->passport_expire_date = $request->passport_expire_date;
        $newSardanikar->issuing_authority = $request->issuing_authority;
        if ($request->hasFile('img')) {
            $newSardanikar->img = Storage::disk('public')->put('sardanikar/', $request->file('img'));
        }
        $newSardanikar->karmand_id = Auth::id();
        $newSardanikar->sarparshtyar_id = $sarparshtyar->sarparshtyar_id;

        if ($newSardanikar->save()) {
            return redirect()->back()->with('success', 'بەسەرکەوتووی تۆمارکرا.')->with('id', $newSardanikar->id);
        }
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
            "nickname" => ['required', 'string', 'max:255'],
            "passport_number" => ['required', 'string','max:255'],
            "birth_date" => ['required', 'date'],
            "gender" => ['required', 'boolean'],
            "nation" => ['required', 'string', 'max:255'],
            "phone" => ['required', 'min:11', 'max:11'],
            "purpose_of_coming" => ['required', 'string','max:255'],
            "address" => ['required', 'string'],
            "img" => ['nullable', 'file', 'image'],
            "status" => ['required', Rule::in(['coming', 'leaving'])],
            "mount_of_money" => ['required', Rule::in(['free', 5000, 10000])],
            "targeted_person" => ['required', 'string', 'max:255'],
            "no_of_visitors" => ['required', 'numeric', 'min:0'],
            "passport_expire_date" => ['required', 'date'],
            "issuing_authority" => ['required', 'string','max:255'],
        ], [], [
            "name" => '(ناو)',
            "nickname" => '(نازناو)',
            "passport_number" => '(ژ.پاسپۆرت)',
            "birth_date" => '(رۆژی لەدایکبوون)',
            "gender" => '(ڕەگەز)',
            "nation" => '(نەتەوە)',
            "phone" => '(ژ.مۆبایل)',
            "purpose_of_coming" => '(هۆکاری هاتن)',
            "address" => '(ناونیشانی شوێنی مانەوە)',
            "img" => '(وێنە)',
            "status" => '(حاڵەت)',
            "mount_of_money" => '(بری پارە)',
            "targeted_person" => '(ناوی ئەو کەسەی دەچێتە لای)',
            "no_of_visitors" => '(ژمارەی سەردانیکەران)',
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
        $sardanikar->purpose_of_coming = $request->purpose_of_coming;
        $sardanikar->address = $request->address;
        $sardanikar->status = $request->status;
        $sardanikar->mount_of_money = $request->mount_of_money === 'free' ? 0 : $request->mount_of_money;
        $sardanikar->targeted_person = $request->targeted_person;
        $sardanikar->no_of_visitors = $request->no_of_visitors;
        $sardanikar->passport_expire_date = $request->passport_expire_date;
        $sardanikar->issuing_authority = $request->issuing_authority;
        if ($request->hasFile('img')) {

            if (Storage::fileExists($sardanikar->img)) {
                Storage::delete($sardanikar->img);
            }
            $sardanikar->img = Storage::disk('public')->put('sardanikar/', $request->file('img'));
        }
        $sardanikar->save();
        return redirect()->back()->with('success', 'بەسەرکەوتووی گۆڕدرا.')->with('id', $sardanikar->id);
    }

    public function showSardanikar(Request $request)
    {
        $sardanikaran = sardanikar::when(!empty($request->search), function (Builder $query) use ($request) {
            $query->where('name', 'like', "%{$request->search}%")
                ->orWhere('passport_number', 'like', "%{$request->search}%")
                ->orWhere('phone', 'like', "%{$request->search}%")
                ->orWhereHas('karmand', function (Builder $query) use ($request) {
                    $query->where('name', 'like', "%{$request->search}%");
                })
                ->orWhereHas('sarparshtyar.user', function (Builder $query) use ($request) {
                    $query->where('name', 'like', "%{$request->search}%");
                })
                ->orWhere('nickname', 'like', "%{$request->search}%");
        })->paginate(25);

        return view('sardanikar.showSardanikar', [
            'sardanikaran' => $sardanikaran,
        ]);
    }
}
