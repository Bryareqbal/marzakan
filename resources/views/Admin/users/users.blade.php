@extends('layouts.Auth')
@section('title', 'بەکارهێنەرەکان')

@section('content')
    <div class="container mx-auto pt-10">
        <section class="flex justify-center">
            <span class="flex items-center space-x-3 space-x-reverse rounded-lg bg-white py-2 px-2">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <span
                        class="flex h-12 w-12 items-center justify-center rounded-xl border border-white bg-emerald-100 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-7 w-7 text-emerald-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
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
                            <div class="flex space-x-3 space-x-reverse p-1">
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
                    <button type="submit" class="flex items-center space-x-1 space-x-reverse focus:outline-none">
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

        <form action="{{ route('users') }}" method="GET"
            class="mt-6 flex flex-col space-y-3 px-3 md:flex-row md:space-y-0">
            <div class="flex md:space-x-5">
                <button type="submit" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-10 w-10 rounded-br-md rounded-tr-md bg-green-600 p-1 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
                <x-input class="w-full" name="name" value="{{ old('name') }}" type="search" placeholder="ناو" />
            </div>
            <div class="flex">
                <button type="submit" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-10 w-10 rounded-br-md rounded-tr-md bg-green-600 p-1 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
                <x-input class="w-full" name="phone_no" type="search" value="{{ old('phone_no') }}"
                    placeholder="ژمارە تەلەفون" />
            </div>
        </form>


        <div class="w-full overflow-auto">
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
                            <tr class="even:bg-slate-100 hover:cursor-pointer">
                                <td class="py-3 px-6 text-right">
                                    {{ $users->firstItem() + $key }}
                                </td>
                                <td class="py-3 px-6 text-right">
                                    <h1 class="capitalize">{{ $user->name }}</h1>
                                    <span class="font-sans">({{ $user->username }})</span>
                                </td>
                                <td class="py-3 px-6 text-center">{{ $user->address }}</td>
                                <td class="py-3 px-6 text-center">
                                    @if ($user->rule->rule === 'superadmin')
                                        بەڕێوبەری باڵا
                                    @elseif($user->rule->rule === 'admin')
                                        سەرپەرشتیار
                                    @elseif($user->rule->rule === 'summary')
                                        بینینی پوختە
                                    @else
                                        کارمەند
                                    @endif
                                </td>

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
                                    <div class="flex items-end justify-end space-x-3 space-x-reverse">
                                        <a title="گۆرینی بەکارهێنەر" href="{{ route('editUser', $user->id) }}"
                                            class="flex h-10 w-10 items-center justify-center rounded border-2 border-blue-200 text-xl hover:border-blue-300 focus:ring-1 focus:ring-blue-500 focus:ring-offset-2">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-blue-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>

                                        </a>
                                        <a title="گۆرینی وشەی نهێنی" href="{{ route('editPassword1', $user->id) }}"
                                            class="focus:ring-btn-ring flex h-10 w-10 items-center justify-center rounded border-2 border-yellow-200 text-xl hover:border-yellow-300 focus:ring-1 focus:ring-yellow-500 focus:ring-offset-2">


                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-yellow-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                            </svg>

                                        </a>
                                        <span title="{{ $user->isActive ? 'چالاک' : 'ناچالاک' }}"
                                            class="{{ $user->isActive ? 'border-emerald-200' : 'border-red-200' }} flex h-10 w-10 items-center justify-center rounded border-2">

                                            @unless ($user->isActive)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-red-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="h-6 w-6 text-emerald-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4.5 12.75l6 6 9-13.5" />
                                                </svg>
                                            @endunless
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="mt-2 flex justify-center">
            {{ $users->onEachSide(5)->links() }}
        </div>
    </div>

@endsection
