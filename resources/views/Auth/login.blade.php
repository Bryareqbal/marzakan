@extends('layouts.guest')
@section('title', 'چوونەژوورەوە')
@section('content')

    <section class="w-full rounded-xl px-5 sm:w-1/2 lg:w-[30rem]">
        <div class="w-full rounded-xl bg-emerald-500 shadow-xl">
            <div class="relative h-48">
                <svg class="absolute -bottom-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#ffffff" fill-opacity="1"
                        d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,85.3C672,75,768,85,864,122.7C960,160,1056,224,1152,245.3C1248,267,1344,245,1392,234.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>
            </div>
        </div>
        <div class="rounded-xl bg-white px-10 pb-8 pt-6">
            <h1 class="text-2xl font-semibold text-slate-900">چوونەژوورەوە</h1>
            @if (session('message'))
                <small class="block rounded-lg p-1 text-center text-sm text-red-500">
                    {{ session('message') }}
                </small>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mt-12 space-y-6">
                    <div class="relative flex flex-col">
                        <input type="text" id="username" name="username"
                            class="peer w-full border-b-2 border-slate-300 py-2 pr-2 placeholder-transparent placeholder:font-sans focus:border-emerald-500 focus:outline-none"
                            placeholder="ناوی بەکارهێنەر" value="{{ old('username') }}">
                        <label for="username"
                            class="absolute -top-3.5 right-0 capitalize text-slate-700 transition-all duration-200 peer-placeholder-shown:top-2 peer-placeholder-shown:text-base peer-placeholder-shown:text-slate-400 peer-focus:-top-3.5 peer-focus:text-slate-600">ناوی
                            بەکارهێنەر</label>
                        <x-error message="username" />
                    </div>
                    <div class="relative flex flex-col">
                        <input type="password" id="password" name="password"
                            class="peer w-full border-b-2 border-slate-300 py-2 pr-2 placeholder-transparent focus:border-emerald-500 focus:outline-none"
                            placeholder="وشەی نهێنی">
                        <label for="password"
                            class="absolute -top-2.5 right-0 capitalize transition-all duration-200 peer-placeholder-shown:top-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-slate-400 peer-focus:-top-2.5 peer-focus:text-slate-600">وشەی
                            نهێنی</label>
                        <x-error message="password" />
                    </div>
                </div>
                <div class="mb-6 mt-10 flex justify-center">
                    <button type="submit"
                        class="w-2/3 rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 px-6 py-2 text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">چوونەژوورەوە</button>
                </div>
            </form>
        </div>
    </section>

@endsection
