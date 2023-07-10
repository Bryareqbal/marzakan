@extends('layouts.Auth')

@section('content')
    <div class="container mx-auto pt-10 ">
        <section class="flex justify-center  flex-col">
            <h1 class="text-xl bg-white flex justify-center items-center px-3 py-2 rounded-md space-x-3 space-x-reverse">
                <span
                    class="flex h-10 w-10 items-center justify-center rounded-xl border border-white bg-green-600 text-white">
                    <svg viewBox="0 0 24 24" class="w-8 h-8" fill="#fff" xmlns="http://www.w3.org/2000/svg" stroke="#22c55e">
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
                            <x-input name="name" id="name" type="text"
                                class=" rounded-lg border border-slate-300 pr-3 py-2" />
                            <x-error message="name" />
                        </fieldset>

                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژ.مۆبایل</legend>
                            <x-input name="phone" id="phone" type="text"
                                class=" rounded-lg border border-slate-300 pr-3 py-2" value="{{ old('phone') }}" />
                            <x-error message="phone" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژ.مۆبایل</legend>
                            <x-select name="marz" id="marz">
                                <option value="">مەرز</option>
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
    </div>
@endsection
