@extends('layouts.Auth')

@section('title', 'Dashboard')
@section('content')
    <div class="container mx-auto mt-10 px-3">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 2xl:grid-cols-4">
            <x-card route="users" label="بەکارهێنەر" model="App\Models\User">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 text-emerald-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                </svg>
            </x-card>
            <x-card route="marzakan" label="مەرزەکان" model="App\Models\Marzakan">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 text-emerald-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                </svg>

            </x-card>
            <x-card route="sarparshtyarakan" label="سەرپەرشتیار" model="App\Models\Sarparshtyar">
                <x-sarparshtyar-logo />
            </x-card>
            <x-card route="karmandakan" label="کارمەند" model="App\Models\Karmand">

                <svg class="h-8 w-8 text-emerald-500" fill="#10b981" viewBox="0 0 100 100"
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
            </x-card>
            <x-card route="sardanikar" label="سەردانیکەر" model="App\Models\Karmand">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#10b981">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M8 13H16C17.7107 13 19.1506 14.2804 19.3505 15.9795L20 21.5M8 13C5.2421 12.3871 3.06717 10.2687 2.38197 7.52787L2 6M8 13V18C8 19.8856 8 20.8284 8.58579 21.4142C9.17157 22 10.1144 22 12 22C13.8856 22 14.8284 22 15.4142 21.4142C16 20.8284 16 19.8856 16 18V17"
                            stroke="#10b981" stroke-width="1.5" stroke-linecap="round"></path>
                        <circle cx="12" cy="6" r="4" stroke="#10b981" stroke-width="1.5"></circle>
                    </g>
                </svg>
            </x-card>
        </div>
    </div>
@endsection
