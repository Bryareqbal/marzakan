<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->firstOrFail();
        return view('profile.profile', ['user' => $user]);
    }

    public function editProfile(Request $request)
    {
        $editProfile = User::with(['rule'])->where('id', $request->id)->firstOrFail();
        $validated = Validator::make($request->all(), [
          'name'=> ['required', 'string', 'max:255'],
          'username'=> ['required', 'alpha_dash', 'max:255',Rule::unique('users', 'username')->ignore($editProfile->id)],
          'gender'=> ['required', 'boolean'],
          'address'=> ['required', 'string', 'max:255'],
          'phone_no'=> ['required', 'string', 'digits:11'],

        ], [], [
          'name'=>'(ناو)',
          'username'=>'(ناوی بەکارهێنەر)',
          'gender'=>'(ڕەگەز)',
          'address'=>'(ناونیشان)',
          'phone_no'=>'(ژ.مۆبایل)',
        ])->validate();

        $editProfile->name = $request->name;
        $editProfile->username = $request->username;
        $editProfile->gender = $request->gender;
        $editProfile->address = $request->address;
        $editProfile->phone_no = $request->phone_no;
        if($editProfile->save()) {
            return redirect()->back()->with('success', 'بەسەرکەتووی نوێکرایەوە .');
        };
    }

    public function editPassword(Request $request)
    {

        $editPassword = User::where('id', Auth::id())->firstOrFail();
        Validator::make($request->all(), [
            'current_password'=>['required','string','max:255','min:8','current_password:web'],
            'newPassword'=>['required','string','max:255','min:8','same:password_confirmation'],
        ], [], [
            'current_password'=>'(وشەی نهێنی ئێستا)',
            'newPassword'=>'( وشەی نهێنی )',
            'password_confirmation'=>'دڵنیابوونەوە لە وشەی نهێنی'
        ])->validate();

        if($request->newPassword !== null) {
            $editPassword->password = $request->newPassword;
        }
        if($editPassword->save()) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('success', 'بەسەرکەتووی وشەی نهێنی گۆردرا .');
        }

    }
}
