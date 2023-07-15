@extends('layouts.Auth')

@section('title', 'سەردانیکەر')
@section('content')
    <div class="container mx-auto px-5 pt-10">
        <section class="flex flex-col justify-center">
            <h1 class="flex items-center justify-center space-x-3 space-x-reverse rounded-md bg-white px-3 py-2 text-xl">
                <span
                    class="flex h-12 w-12 items-center justify-center rounded-xl border border-white bg-emerald-100 text-white">
                    <x-sarparshtyar-logo />

                </span>
                <span>سەرپەرشتیارەکان</span>
            </h1>

            <div class="flex items-center space-x-4 space-x-reverse">
                <span class="h-3 w-3 rounded bg-green-600">
                </span>
                <h1 class="underline decoration-green-600 decoration-2 underline-offset-8">
                    زیادکردنی سەرپەرشتیار
                </h1>
            </div>
            <form class="mt-6 max-w-6xl" action="{{ route('add-sarparshtyar') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">

                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی سەرپەرشتیار </legend>
                            <x-select name="user_id" id="marz">
                                <option value="">هەڵبژێرە</option>
                                @foreach ($users as $user)
                                    <option @selected(old('user_id') == $user->id) value="{{ $user->id }}">{{ $user->name }}
                                    </option>
                                @endforeach

                            </x-select>
                            <x-error message="user_id" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژ.مۆبایل</legend>
                            <x-input name="phone" id="phone" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3" maxlength="11"
                                value="{{ old('phone') }}" />
                            <x-error message="phone" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">مەرز</legend>
                            <x-select name="marz" id="marz">
                                <option value="">هەڵبژێرە</option>
                                @foreach ($marzakan as $marz)
                                    <option @selected(old('marz') == $marz->id) value="{{ $marz->id }}">{{ $marz->name }}
                                    </option>
                                @endforeach

                            </x-select>
                            <x-error message="marz" />
                        </fieldset>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="flex items-center space-x-1 space-x-reverse">
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
            <form action="{{ route('sarparshtyarakan') }}" method="GET"
                class="flex flex-col space-y-5 md:flex-row md:space-y-0 md:space-x-3 md:space-x-reverse">
                <div class="flex items-center">
                    <button type="submit" class="focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-10 w-10 rounded-br-md rounded-tr-md bg-green-600 p-1 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                    <x-input name="sarparshtyar_name" value="{{ old('sarparshtyar_name') }}" type="search" class="w-full"
                        placeholder="ناوی سەرپەرشتیار" />
                </div>
                <div class="flex items-center">
                    <button type="submit" class="focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-10 w-10 rounded-br-md rounded-tr-md bg-green-600 p-1 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                    <x-input name="marz_name" type="search" value="{{ old('marz_name') }}" class="w-full"
                        placeholder="ناوی مەرز " />
                </div>
            </form>
        </div>


        @if ($sarparshtyarakan->isNotEmpty())
            <div class="overflow-auto">
                <table class="mt-6 w-full min-w-max">
                    <thead class="rounded-lg bg-gradient-to-br from-green-500 to-green-600 text-white">
                        <tr>
                            <th class="px-3 py-2 text-right font-medium">#</th>
                            <th class="px-3 py-2 text-center font-medium">ناوی سەرپەرشتیار </th>
                            <th class="px-3 py-2 text-center font-medium">ژ.مۆبایل</th>
                            <th class="px-3 py-2 text-center font-medium">ناوی مەرز</th>
                            <th class="px-3 py-2 text-center font-medium">چالاکی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sarparshtyarakan as $key => $sarparshtyar)
                            <tr class="even:bg-slate-100 hover:cursor-pointer">
                                <td class="px-3 py-2 text-right font-medium">
                                    {{ $sarparshtyarakan->firstItem() + $key }}</td>
                                <td class="px-3 py-2 text-center font-medium">
                                    {{ $sarparshtyar->user->name }}</td>
                                <td class="px-3 py-2 text-center font-medium uppercase">
                                    {{ $sarparshtyar->phone }}</td>
                                <td class="px-3 py-2 text-center font-medium uppercase">
                                    {{ $sarparshtyar->marz->name }}</td>
                                <td class="flex justify-center px-3 py-2 text-left font-medium uppercase">
                                    <a href="{{ route('edit-sarparshtyar', $sarparshtyar->id) }}">
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
            </div>
        @endif
    </div>
@endsection
