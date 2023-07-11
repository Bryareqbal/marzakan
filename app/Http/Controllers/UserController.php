<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::when(!empty($request->name), function (Builder $query) use ($request) {
            $query->where('name', 'like', "%{$request->name}%");
        })->when($request->phone, function (Builder $query) use ($request) {
            $query->where('phone', 'like', "%{$request->phone}%");
        })->latest()->simplePaginate(12);
        $Roles = Rule::whereNotIn('id', [1])->get();
        return view('Admin.users.users', ['Roles'=>$Roles,'users'=>$users]);
    }

    public function userAdd(Request $request)
    {

        $validated = Validator::make($request->all(), [
          'name'=> ['required', 'string', 'max:255'],
          'username'=> ['required', 'alpha_dash', 'max:255', 'unique:users,username'],
          'password'=> ['required', 'string', 'min:8', 'max:255', 'confirmed'],
          'gender'=> ['required', 'boolean'],
          'address'=> ['required', 'string', 'max:255'],
          'phone_no'=> ['required', 'string', 'digits:11'],
          'role_id'=> ['required', 'integer', 'exists:rules,id'],

        ], [], [
          'name'=>'(ناو)',
          'username'=>'(ناوی بەکارهێنەر)',
          'password'=>'(وشەی نهێنی)',
          'gender'=>'(ڕەگەز)',
          'address'=>'(ناونیشان)',
          'phone_no'=>'(ژ.مۆبایل)',
          'role_id'=>'(ئەرک)',
        ])->validate();

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->username = $request->username;
        $newUser->password = Hash::make($request->password);
        $newUser->gender = $request->gender;
        $newUser->address = $request->address;
        $newUser->phone_no = $request->phone_no;
        $newUser->rule_id = $request->role_id;
        if($newUser->save()) {
            return redirect()->back()->with('success', 'بەسەرکەتووی زیادکرا .');

        };

    }
}
