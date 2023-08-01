<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>پسوڵەی سەردانیکەر</title>
    <style>
        body {
            width: 180mm;
            height: 267mm;
            margin: 0 auto;
        }
    </style>
</head>

<body class="mx-auto border border-gray-600 px-5">

    <header class="flex justify-between p-3">
        <span>{!! DNS2D::getBarcodeSVG(
            "$sardani->id" . ",{$sardani->sardanikar->name}" . ",{$sardani->sardanikar->passport_number}",
            'QRCODE',
            4,
            4,
        ) !!}</span>
        <img class="aspect-square w-[10rem] rounded-md object-cover object-center"
            src="{{ Storage::url($sardani->sardanikar->img) }}" alt="">
    </header>

    <main>

        <div class="space-y-5 border-b border-dashed border-gray-700">
            <h1 class="underline decoration-green-500 decoration-2">
                زانیاری پاسپۆرت
            </h1>
            <div class="grid grid-cols-3 gap-5 pb-5">
                <div>
                    <h1>
                        ناو:
                    </h1>
                    <span
                        class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">{{ $sardani->sardanikar->name }}
                        hoshmand</span>
                </div>
                <div>
                    <h1>
                        نازناو:
                    </h1>
                    <span
                        class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">{{ $sardani->sardanikar->nickname }}</span>
                </div>
                <div>
                    <h1>
                        ژمارەی پاسپۆرت:
                    </h1>
                    <span
                        class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">{{ $sardani->sardanikar->passport_number }}</span>
                </div>
                <div>
                    <h1>
                        بەرواری لەدایکبوون:
                    </h1>
                    <span
                        class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">{{ $sardani->sardanikar->birth_date }}</span>
                </div>
                <div>
                    <h1>
                        ڕەگەز:
                    </h1>
                    <span
                        class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">{{ $sardani->sardanikar->gender ? 'نێر' : 'مێ' }}</span>
                </div>
                <div>
                    <h1>
                        نەتەوە:
                    </h1>
                    <span
                        class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">{{ $sardani->sardanikar->nation }}</span>
                </div>
                <div class="space-y-2.5">
                    <h1 class="text-xs">
                        بەرواری بەسەرچوونی پاسپۆرت:
                    </h1>
                    <span
                        class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">{{ $sardani->sardanikar->passport_expire_date ?? '-' }}</span>
                </div>
                <div>
                    <h1>
                        دەسەڵاتی دەرکردن
                    </h1>
                    <span
                        class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">{{ $sardani->sardanikar->issuing_authority }}</span>
                </div>
                <div>
                    <h1>
                        ژ.مۆبایل:
                    </h1>
                    <span
                        class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">{{ $sardani->sardanikar->phone }}</span>
                </div>
            </div>
        </div>
        <div class="mt-5 space-y-5 border-b border-dashed border-gray-700 p-5">
            <h1 class="underline decoration-green-500 decoration-2">
                زانیاری سەردانیکەر
            </h1>
            <div class="grid grid-cols-3 gap-5">


                <div>
                    <h1>
                        حاڵەت:</h1>
                    @if ($sardani->status === 'coming')
                        <span
                            class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">هاتن</span>
                    @else
                        <span
                            class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">ڕۆشتن</span>
                    @endif
                </div>
                <div>
                    <h1>
                        بڕی پارە:</h1>
                    <span
                        class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">{{ number_format($sardani->mount_of_money, 0, '.', ',') }}</span>
                </div>
                <div class="space-y-2.5">
                    <h1 class="text-xs">
                        ناوی ئەو کەسەی دەچێتە لای
                    </h1>
                    <span
                        class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">{{ $sardani->targeted_person ?? '-' }}</span>
                </div>
                <div class="space-y-2.5">
                    <h1 class="text-xs">
                        ژ.مۆبایلی ئەو کەسەی دەچیتە لای
                    </h1>
                    <span
                        class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">{{ $sardani->targeted_person ?? '-' }}</span>
                </div>
            </div>
            <div>
                <h1>
                    مەبەستی هاتن:
                </h1>
                <span
                    class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">{{ $sardani->purpose_of_coming ?? '-' }}</span>
            </div>
            <div>
                <h1>
                    شوێنی مانەوە:
                </h1>
                <span
                    class="inline-block w-full rounded border-2 border-dotted border-gray-500 px-3 py-2 text-sm">{{ $sardani->address ?? '-' }}</span>
            </div>
        </div>



    </main>

    <script>
        window.print()
        // window.close()
    </script>
</body>

</html>
