@extends('layouts.Auth')

@section('content')
    <div class="mx-auto max-h-[297mm] max-w-[210mm] p-5">
        <header class="flex justify-between">
            <div>
                <h1>{{ $sardanikar->name }}</h1>
                <h2>{{ $sardanikar->birth_date }}</h2>
            </div>
            <div class="w-[10rem]">
                <img class="aspect-square w-full rounded-md object-cover object-center"
                    src="{{ Storage::url($sardanikar->img) }}" alt="">
            </div>
        </header>
    </div>
@endsection
