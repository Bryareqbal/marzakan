@extends('layouts.Auth')
@section('title', 'هەژماری بەکارهێنەر')

@section('content')
    <div class="container mx-auto space-y-10 pt-10">
        <section class="flex justify-center">
            <span class="flex items-center space-x-3 space-x-reverse rounded-lg bg-white py-2 px-2">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <span
                        class="flex h-12 w-12 items-center justify-center rounded-xl border border-white bg-emerald-100 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-7 w-7 text-emerald-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </span>
                    <h1 class="text-xl">هەژماری بەکارهێنەر</h1>
                </div>
            </span>
        </section>


        <div>
            @include('profile.profileInformation')
        </div>
        <div>
            @include('profile.editPassword')
        </div>

    </div>

@endsection
