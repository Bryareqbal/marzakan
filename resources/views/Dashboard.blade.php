@extends('layouts.Auth')

@section('title', 'Dashboard')
@section('content')
    <div class="container mx-auto mt-10">
        <div class="grid gap-5 grid-cols-6">
            <x-card label="slaw" />
            <x-card label="slaw" />
            <x-card label="slaw" />
            <x-card label="slaw" />
        </div>
    </div>

@endsection
