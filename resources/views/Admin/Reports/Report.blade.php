@extends('layouts.Auth')
@section('title', 'ڕاپۆرت')

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
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                    </span>
                    <h1 class="text-xl">ڕاپۆرت</h1>
                </div>
            </span>
        </section>
        <section class="mt-6 rounded-lg bg-white p-3">
            <div class="flex items-center space-x-4 space-x-reverse">
                <span class="h-3 w-3 rounded bg-green-600">
                </span>
                <h1 class="underline decoration-green-600 decoration-2 underline-offset-8">
                    بەشی ڕاپۆرت
                </h1>
            </div>
            <form method="GET" action="{{ route('reports') }}" class="mt-6 max-w-7xl">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">

                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">گەڕان</legend>
                            <x-input class="w-full" name="search" id="search" type="text"
                                value="{{ old('search') }}" />
                        </fieldset>
                    </div>
                    <div class="col-start-1 flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">بەراور</legend>
                            <x-input class="w-full" name="created_at" id="created_at" type="date"
                                value="{{ old('created_at') }}" />
                        </fieldset>
                    </div>

                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی مەرز</legend>
                            <x-select name="marz_id">
                                <option value="">هەڵبژێرە</option>
                                @foreach ($marzakan as $key => $marz)
                                    <option @selected(old('marz_id') == $marz->id) value="{{ $marz->id }}">
                                        {{ $marz->name }}
                                    </option>
                                @endforeach
                            </x-select>
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی سەرپەرشتیار </legend>
                            <x-select name="sarparshtyar_id">
                                <option value="">هەڵبژێرە</option>
                                @foreach ($sarprshtyarkan as $key => $sarparshtyar)
                                    <option @selected(old('sarparshtyar_id') == $sarparshtyar->id) value="{{ $sarparshtyar->id }}">
                                        {{ $sarparshtyar->user->name }}
                                    </option>
                                @endforeach
                            </x-select>
                        </fieldset>
                    </div>


                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی کارمەند </legend>
                            <x-select name="karmand_id">
                                <option value="">هەڵبژێرە</option>
                                @foreach ($karmandkan as $key => $karmand)
                                    <option @selected(old('karmand_id') == $karmand->id) value="{{ $karmand->id }}">
                                        {{ $karmand->user->name }}
                                    </option>
                                @endforeach
                            </x-select>
                        </fieldset>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="flex items-center space-x-1 space-x-reverse focus:outline-none">
                        <span
                            class="flex h-8 w-8 items-center justify-center rounded rounded-br-md rounded-tr-md border shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                            </svg>

                        </span>
                        <div
                            class="flex items-center space-x-3 space-x-reverse rounded-bl-md rounded-tl-md bg-gradient-to-br from-yellow-500 to-yellow-600 py-1 px-6 text-white">
                            <span>وەرگرتنی راپۆرت</span>
                        </div>
                    </button>
                </div>
                <hr class="mt-4 max-w-4xl border border-dashed border-slate-500">
            </form>

        </section>



        <div class="flex justify-between">
            <div class="border-opacity-15 w-1/3 rounded-xl border p-5 shadow-xl">
                <ul class="flex items-center justify-between">
                    <li>کۆی پارە</li>
                    @if ($sumPrice)
                        <li class="font-medium">{{ number_format($sumPrice, 0, '.', ',') }} دینار</li>
                    @else
                        <li class="font-medium">{{ number_format(0, 0, '.', ',') }} دینار</li>
                    @endif
                </ul>
            </div>
            <div class="border-opacity-15 w-1/3 rounded-xl border p-5 shadow-xl hover:drop-shadow-xl">
                <ul class="flex items-center justify-between">
                    <li>کۆی سەردانیکەر</li>
                    @if ($count_of_sardanikat)
                        <li class="font-medium">{{ number_format($count_of_sardanikat, 0, '.', ',') }}</li>
                    @else
                        <li class="font-medium">{{ number_format(0, 0, '.', ',') }}</li>
                    @endif
                </ul>
            </div>
        </div>

        @if ($reports->isNotEmpty())
            <div class="w-full">
                <table class="mt-6 w-full">
                    <thead class="rounded-lg bg-gradient-to-br from-green-500 to-green-600 text-white">
                        <tr>
                            <th class="py-3 px-1 text-right font-medium">#</th>
                            <th class="py-3 px-1 text-right font-medium">ناو</th>
                            <th class="py-3 px-1 text-right font-medium">ناوی سەرپەرشتیار</th>
                            <th class="py-3 px-1 text-right font-medium">ناوی کارمەند</th>
                            <th class="py-3 px-1 text-center font-medium">ژمارەی پاسۆرت</th>
                            <th class="py-3 px-1 text-center font-medium">نەتەوە</th>
                            <th class="py-3 px-1 text-center font-medium">ژمارە تەلەفون</th>
                            <th class="py-3 px-1 text-center font-medium">بڕی پارە</th>
                            <th class="py-3 px-1 text-center font-medium">حاڵات</th>
                            <th class="py-3 px-1 text-center font-medium">بەرواری زیادکردن</th>
                            <th class="py-3 px-1 text-center font-medium">چالاکی</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($reports as $key => $report)
                            <tr class="even:bg-slate-100 hover:cursor-pointer">
                                <td class="py-3 px-6 text-right">
                                    {{ $reports->firstItem() + $key }}
                                </td>
                                <td class="py-3 px-6 text-right capitalize">{{ $report->name }}</td>
                                <td class="py-3 px-6 text-right capitalize">
                                    {{ $report->karmand->sarparshtyar->user->name }}</td>
                                <td class="py-3 px-6 text-right capitalize">
                                    {{ $report->karmand->user->name }}</td>
                                <td class="py-3 px-6 text-center">{{ $report->password_number }}</td>
                                <td class="py-3 px-6 text-center">{{ $report->nation }}</td>
                                <td class="py-3 px-6 text-center">{{ $report->phone }}</td>
                                <td class="py-3 px-6 text-center">
                                    {{ number_format($report->mount_of_money, 0, '.', ',') }}
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @unless ($report->status === 'coming')
                                        <div class="flex items-center space-x-1 space-x-reverse">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-emerald-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75l3 3m0 0l3-3m-3 3v-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>هاتن</span>
                                        </div>
                                    @else
                                        <div class="flex items-center space-x-1 space-x-reverse">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="h-6 w-6 rotate-180 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75l3 3m0 0l3-3m-3 3v-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>رۆشتن</span>
                                        </div>
                                    @endunless
                                </td>
                                <td class="py-3 px-6 text-center font-sans">
                                    {{ $report->created_at->format('Y-m-d H:i:s A') }}</td>
                                <td class="py-3 px-6 text-center font-sans">
                                    <a title="گۆرانکاری"
                                        class="flex h-10 w-10 items-center justify-center rounded border-2 border-blue-200 text-xl hover:border-blue-300 focus:ring-1 focus:ring-blue-500 focus:ring-offset-2">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-blue-500">
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
        {{ $reports->links() }}
    </div>

@endsection
