@extends('layouts.Auth')
@section('title', 'کارمەندەکان')

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
                    <h1 class="text-xl">کارمەند</h1>
                </div>
            </span>
        </section>
        <section class="mt-6 rounded-lg bg-white p-3">
            <div class="flex items-center space-x-4 space-x-reverse">
                <span class="h-3 w-3 rounded bg-green-600">
                </span>
                <h1 class="underline decoration-green-600 decoration-2 underline-offset-8">
                    زیادکردنی کارمەند
                </h1>
            </div>
            <form method="POST" action="{{ route('addNewKarmand') }}" class="mt-6 max-w-6xl">
                @csrf
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی سەرپەشتیار </legend>
                            <x-select name="sarparshtyar_id">
                                <option value="">هەڵبژێرە</option>
                                @foreach ($sarparshtyarakan as $key => $sarparshtyar)
                                    <option @selected(old('sarparshtyar_id') == $sarparshtyar->id) value="{{ $sarparshtyar->id }}">
                                        {{ $sarparshtyar->name }}</option>
                                @endforeach
                            </x-select>
                            <x-error message="sarparshtyar_id" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی کارمەند </legend>
                            <x-input name="name" id="name" type="text" value="{{ old('name') }}" />
                            <x-error message="name" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژمارە تەلەفون</legend>
                            <x-input name="phone" id="phone" maxLength="11" type="text"
                                value="{{ old('phone') }}" />
                            <x-error message="phone" />
                        </fieldset>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="flex focus:outline-none items-center space-x-1 space-x-reverse">
                        <span
                            class="flex h-8 w-8 items-center justify-center rounded rounded-br-md rounded-tr-md border shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
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
            <form action="{{ route('karmandakan') }}" method="GET" class="flex items-center">
                <button type="submit" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-10 w-10 rounded-br-md rounded-tr-md bg-green-600 p-1 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
                <x-input name="name" value="{{ old('name') }}" type="search" class="w-3/12 pr-3"
                    placeholder="ناوی کارمەند" />
                <button type="submit" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="h-10 w-10 mr-3 rounded-br-md rounded-tr-md bg-green-600 p-1 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
                <x-input name="phone" type="search" value="{{ old('phone') }}" class="w-3/12  pr-3"
                    placeholder="ژمارە تەلەفون" />
            </form>
        </div>

        <div class="w-full">
            @if ($karmandakan->isNotEmpty())
                <table class="mt-6 w-full">
                    <thead class="rounded-lg bg-gradient-to-br from-green-500 to-green-600 text-white">
                        <tr>
                            <th class="px-3 py-2 text-right font-medium">#</th>
                            <th class="px-3 py-2 text-center font-medium">ناوی کارمەند</th>
                            <th class="px-3 py-2 text-center font-medium">ژمارە تەلەفون</th>
                            <th class="px-3 py-2 text-center font-medium">سەرپەرشتیار</th>
                            <th class="px-3 py-2 text-center font-medium">چالاکی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karmandakan as $key => $karmand)
                            <tr class="even:bg-green-100 hover:cursor-pointer hover:bg-green-200">
                                <td class="px-3 py-2 text-right font-medium">{{ $karmandakan->firstItem() + $key }}</td>
                                <td class="px-3 py-2 text-center font-medium">{{ $karmand->name }}</td>
                                <td class="px-3 py-2 text-center font-medium uppercase">{{ $karmand->phone }}</td>
                                <td <td class=" px-3 py-2 text-center font-medium uppercase">
                                    {{ $karmand->sarparshtyar->name }}</td>
                                <td class="border-green-600 px-3 py-2 flex justify-center  font-medium uppercase">
                                    <a href="{{ route('editKarmand', $karmand->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="mt-2 flex justify-center">
            {{ $karmandakan->links() }}
        </div>
    </div>
@endsection