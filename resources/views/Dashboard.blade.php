@extends('layouts.Auth')

@section('title', 'Dashboard')
@section('content')
    <div class="container mx-auto mt-10">
        <div class="grid gap-5 grid-cols-6">
            <x-card label="مەرزەکان" route="marzakan" />
            <x-card label="سەرپەرشتیار" route="sarparshtyarakan" />
            <x-card label="کارمەند" route="karmand" />
            <x-card label="سەردانیکەر" route="sardanikar" />
        </div>
    </div>
@endsection
