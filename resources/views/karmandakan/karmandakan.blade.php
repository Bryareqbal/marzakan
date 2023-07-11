@extends('layouts.Auth')
@section('title', 'کارمەندەکان')

@section('content')
    <div class="container mx-auto pt-10">
        <section class="flex justify-center">
            <span class="flex items-center space-x-3 space-x-reverse rounded-lg bg-white py-2 px-2">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <span
                        class="flex h-12 w-12 items-center justify-center rounded-xl border border-white bg-emerald-100 text-white">
                        <svg class="h-9 w-9 text-emerald-500" fill="#10b981" viewBox="0 0 100 100"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <circle cx="63.3" cy="47.6" r="10.7"></circle>
                                <path
                                    d="M63.6,60.3h-.8A16.43,16.43,0,0,0,46.7,74.2c0,.7.2,2.4,2.7,2.4H76.6c2.5,0,2.7-1.5,2.7-2.4A15.65,15.65,0,0,0,63.6,60.3Z">
                                </path>
                                <path
                                    d="M48.6,58.3c.4-.4.1-.7.1-.7h0a17.94,17.94,0,0,1-3.1-10,17.18,17.18,0,0,1,3.2-10.2.1.1,0,0,1,.1-.1,1.76,1.76,0,0,0,.4-1.1V25.4a2.15,2.15,0,0,0-2-2H22.5a2.18,2.18,0,0,0-2,2.1V71.7H40a24.12,24.12,0,0,1,8.6-13.4ZM31.6,66a2.18,2.18,0,0,1-2.1,2.1H27.4A2.18,2.18,0,0,1,25.3,66V63.9a2.18,2.18,0,0,1,2.1-2.1h2.1a2.18,2.18,0,0,1,2.1,2.1Zm0-10.5a2.18,2.18,0,0,1-2.1,2.1H27.4a2.18,2.18,0,0,1-2.1-2.1V53.4a2.18,2.18,0,0,1,2.1-2.1h2.1a2.18,2.18,0,0,1,2.1,2.1Zm0-10.5a2.18,2.18,0,0,1-2.1,2.1H27.4A2.18,2.18,0,0,1,25.3,45V42.9a2.18,2.18,0,0,1,2.1-2.1h2.1a2.18,2.18,0,0,1,2.1,2.1Zm0-10.5a2.18,2.18,0,0,1-2.1,2.1H27.4a2.18,2.18,0,0,1-2.1-2.1V32.4a2.18,2.18,0,0,1,2.1-2.1h2.1a2.18,2.18,0,0,1,2.1,2.1Zm11.9,21a2.18,2.18,0,0,1-2.1,2.1H39.3a2.18,2.18,0,0,1-2.1-2.1V53.4a2.18,2.18,0,0,1,2.1-2.1h2.1a2.18,2.18,0,0,1,2.1,2.1Zm0-10.5a2.18,2.18,0,0,1-2.1,2.1H39.3A2.18,2.18,0,0,1,37.2,45V42.9a2.18,2.18,0,0,1,2.1-2.1h2.1a2.18,2.18,0,0,1,2.1,2.1Zm0-10.5a2.18,2.18,0,0,1-2.1,2.1H39.3a2.18,2.18,0,0,1-2.1-2.1V32.4a2.18,2.18,0,0,1,2.1-2.1h2.1a2.18,2.18,0,0,1,2.1,2.1Z">
                                </path>
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
                    <button type="submit" class="flex items-center space-x-1 space-x-reverse focus:outline-none">
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
                        class="mr-3 h-10 w-10 rounded-br-md rounded-tr-md bg-green-600 p-1 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
                <x-input name="phone" type="search" value="{{ old('phone') }}" class="w-3/12 pr-3"
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
                                <td <td class="px-3 py-2 text-center font-medium uppercase">
                                    {{ $karmand->sarparshtyar->name }}</td>
                                <td class="flex justify-center border-green-600 px-3 py-2 font-medium uppercase">
                                    <a href="{{ route('editKarmand', $karmand->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
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
