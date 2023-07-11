@extends('layouts.Auth')
@section('title', 'گۆرانکاری مەرز')

@section('content')
    <div class="container mx-auto pt-10">
        <section class="flex justify-center">
            <span class="flex items-center space-x-3 space-x-reverse rounded-lg bg-white py-2 px-2">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <span
                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-white bg-green-600 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </span>
                    <h1 class="text-xl">گۆرینی مەرز</h1>
                </div>
            </span>
        </section>
        <section class="mt-6 rounded-lg bg-white p-3">
            <div class="flex items-center space-x-4 space-x-reverse">
                <span class="h-3 w-3 rounded bg-green-600">
                </span>
                <h1 class="underline decoration-green-600 decoration-2 underline-offset-8">
                    گۆرانکاری لە مەرز
                </h1>
            </div>
            <form method="POST" action="{{ route('saveMarzakan', $user->id) }}" class="mt-6 max-w-6xl">
                @csrf
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی مەرز </legend>
                            <x-input name="name" id="name" type="text" value="{{ $user->name }}" />
                            <x-error message="name" />
                        </fieldset>

                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناونیشان</legend>
                            <x-input name="address" id="address" type="text" value="{{ $user->address }}" />
                            <x-error message="address" />
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
                            <span>گۆرین</span>
                        </div>
                    </button>
                </div>
                <hr class="mt-4 max-w-4xl border border-dashed border-slate-500">
            </form>
        </section>
    </div>

@endsection
