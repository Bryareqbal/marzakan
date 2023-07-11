@extends('layouts.Auth')
@section('title', 'بەکارهێنەرەکان')

@section('content')
    <div class="container mx-auto pt-10">
        <section class="flex justify-center">
            <span class="flex items-center space-x-3 space-x-reverse rounded-lg bg-white py-2 px-2">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <span
                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-white bg-green-600 text-white">
                        <svg viewBox="0 0 24 24" class="w-8 h-8" fill="#fff" xmlns="http://www.w3.org/2000/svg"
                            stroke="#22c55e">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                    stroke="#22c55e" stroke-width="1.5"></path>
                                <path d="M8 12H16" stroke="#22c55e" stroke-width="1.5" stroke-linecap="round"></path>
                                <path d="M8 8H16" stroke="#22c55e" stroke-width="1.5" stroke-linecap="round"></path>
                                <path d="M8 16H13" stroke="#22c55e" stroke-width="1.5" stroke-linecap="round"></path>
                            </g>
                        </svg>
                    </span>
                    <h1 class="text-xl">بەکارهێنەرەکان</h1>
                </div>
            </span>
        </section>
        <section class="mt-6 rounded-lg bg-white p-3">
            <div class="flex items-center space-x-4 space-x-reverse">
                <span class="h-3 w-3 rounded bg-green-600">
                </span>
                <h1 class="underline decoration-green-600 decoration-2 underline-offset-8">
                    زیادکردنی بەکارهێنەر
                </h1>
            </div>
            <form method="POST" action="{{ route('userAdd') }}" class="mt-6 max-w-7xl">
                @csrf
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">

                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناو </legend>
                            <x-input class="w-full" name="name" id="name" type="text"
                                value="{{ old('name') }}" />
                            <x-error message="name" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی بەکارهێنەر</legend>
                            <x-input class="w-full" name="username" id="username" type="text"
                                value="{{ old('username') }}" />
                            <x-error message="username" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2"> وشەی نهێنی</legend>
                            <x-input class="w-full" type="password" name="password" id="password"
                                value="{{ old('password') }}" />
                            <x-error message="password" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2"> دڵنیاکردنەوەی وشەی نهێنی</legend>
                            <x-input class="w-full" name="password_confirmation" type="password"
                                value="{{ old('password_confirmation') }}" />
                            <x-error message="password_confirmation" />
                        </fieldset>
                    </div>

                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-3">
                            <legend class="px-2">ڕەگەز</legend>
                            <div class="flex space-x-reverse space-x-3 p-1">
                                <label for="type_position">
                                    <input type="radio"
                                        class="h-4 w-4 accent-green-600 focus:ring-1 focus:ring-green-600 focus:ring-offset-1"
                                        id="type_position" value="{{ 1 }}" name="gender" />
                                    نێر
                                </label>
                                <label for="type_position2">
                                    <input type="radio" value="{{ 0 }}"
                                        class="h-4 w-4 accent-green-600 focus:ring-1 focus:ring-green-600 focus:ring-offset-1"
                                        id="type_position2" name="gender" />
                                    مێ
                                </label>

                            </div>
                            <x-error message="gender" />

                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناونیشان</legend>
                            <x-input class="w-full" name="address" id="address" type="text"
                                value="{{ old('address') }}" />
                            <x-error message="address" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژمارە تەلەفون</legend>
                            <x-input class="w-full" name="phone_no" id="phone_no" maxLength="11" type="text"
                                value="{{ old('phone_no') }}" />
                            <x-error message="phone_no" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ئەرک </legend>
                            <x-select name="role_id">
                                <option value="">هەڵبژێرە</option>
                                @foreach ($Roles as $key => $role)
                                    <option @selected(old('rule_id') == $role->id) value="{{ $role->id }}">{{ $role->rule }}
                                    </option>
                                @endforeach
                            </x-select>
                            <x-error message="role_id" />
                        </fieldset>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="flex focus:outline-none items-center space-x-1 space-x-reverse">
                        <span
                            class="flex h-8 w-8 items-center justify-center rounded rounded-br-md rounded-tr-md border shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                            </svg>
                        </span>
                        <div
                            class="flex items-center space-x-3 space-x-reverse rounded-bl-md rounded-tl-md bg-gradient-to-br from-green-500 to-green-600 py-1 px-6 text-white">
                            <span>زیادکردن</span>
                        </div>
                    </button>
                </div>
                <hr class="mt-4 max-w-4xl border border-dashed border-slate-500">
            </form>

        </section>
        <div class="mt-6 max-w-6xl">
            <form action="{{ route('users') }}" method="GET" class="flex items-center">
                <button type="submit" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-10 w-10 rounded-br-md rounded-tr-md bg-green-600 p-1 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
                <x-input class="w-full" name="name" value="{{ old('name') }}" type="search" class="w-3/12 pr-3"
                    placeholder="ناو" />
                <button type="submit" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="h-10 w-10 mr-3 rounded-br-md rounded-tr-md bg-green-600 p-1 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
                <x-input class="w-full" name="phone_no" type="search" value="{{ old('phone_no') }}"
                    class="w-3/12  pr-3" placeholder="ژمارە تەلەفون" />
            </form>
        </div>

        <div class="w-full">
            @if ($users->isNotEmpty())
                <table class="mt-6 w-full">
                    <thead class="rounded-lg bg-gradient-to-br from-green-500 to-green-600 text-white">
                        <tr class="">

                            <th class="py-3 px-6 text-right font-medium">#</th>
                            <th class="py-3 px-6 text-right font-medium">ناوی بەکارهێنەر</th>
                            <th class="py-3 px-6 text-center font-medium">ناونیشان</th>
                            <th class="py-3 px-6 text-center font-medium">ئەرک</th>
                            <th class="py-3 px-6 text-center font-medium">ڕەگەز</th>
                            <th class="py-3 px-6 text-center font-medium">ژمارە تەلەفون</th>
                            <th class="py-3 px-6 text-center font-medium">بەروار</th>
                            <th class="py-3 px-6 text-center font-medium">چالاکی</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $key => $user)
                            <tr class="even:bg-green-100 hover:cursor-pointer hover:bg-green-200">
                                <td class="py-3 px-6 text-right">
                                    {{ $users->firstItem() + $key }}
                                </td>
                                <td class="py-3 px-6 text-right">
                                    <h1 class="capitalize">{{ $user->name }}</h1>
                                    <span class="font-sans">({{ $user->username }})</span>
                                </td>
                                <td class="py-3 px-6 text-center">{{ $user->address }}</td>
                                <td class="py-3 px-6 text-center">{{ $user->rule->rule }}</td>
                                <td class="py-3 px-6 text-center">
                                    @unless ($user->gender)
                                        مێ
                                    @else
                                        نێر
                                    @endunless
                                </td>
                                <td class="py-3 px-6 text-center font-sans">{{ $user->phone_no }}</td>
                                <td class="py-3 px-6 text-center font-sans md:truncate">
                                    {{ $user->created_at->format('Y-m-d H:i:s A') }}</td>
                                <td class="relative py-3 px-6 text-center">
                                    <div class="item-center flex justify-center space-x-3 space-x-reverse">
                                        <a href="{{ route('editUser', $user->id) }}"
                                            class="flex h-10 w-10 items-center justify-center rounded border-2 border-blue-200 text-xl hover:border-blue-300 focus:ring-1 focus:ring-blue-500 focus:ring-offset-2">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>

                                        </a>
                                        <a href="{{ route('editPassword', $user->id) }}"
                                            class="focus:ring-btn-ring flex h-10 w-10 items-center justify-center rounded border-2 border-yellow-200 text-xl hover:border-yellow-300 focus:ring-1 focus:ring-offset-2">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>


                                        </a>
                                        {{-- 
                                        <form action="{{ route('users') }}">
                                            <button type="button" wire:click="changeActivityUser('{{ $user->id }}')"
                                                title="{{ $user->isActive ? 'چالاک' : 'ناچالاک' }}"
                                                class="focus:ring-{{ $user->isActive ? 'green' : 'red' }}-500 flex h-10 w-10 items-center justify-center rounded border border-emerald-200 text-xl hover:border-slate-300 focus:ring-1 focus:ring-offset-2">
                                                @unless ($user->isActive)
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="h-6 w-6 text-red-500 hover:text-red-600">
                                                        <path fill-rule="evenodd"
                                                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6 text-emerald-500 hover:text-emerald-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M4.5 12.75l6 6 9-13.5" />
                                                    </svg>
                                                @endunless
                                            </button>
                                        </form> --}}

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="mt-2 flex justify-center">
            {{ $users->links() }}
        </div>
    </div>

@endsection
