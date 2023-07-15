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
            width: 210mm;
            height: 297mm;
            margin: 0 auto;
        }
    </style>
</head>

<body class="mx-auto">

    <header class="flex justify-between border-b border-gray-300 p-3">
        <span>{!! DNS2D::getBarcodeSVG("$sardanikar->id".",$sardanikar->name".",$sardanikar->passport_number", 'QRCODE', 7, 7) !!}</span>
        <img class="aspect-square w-[10rem] rounded-md object-cover object-center"
            src="{{ Storage::url($sardanikar->img) }}" alt="">
    </header>

    <main class="p-5">

        <div class="space-y-5 border-b border-dashed border-gray-700 text-xl">
            <h1 class="underline decoration-green-500 decoration-2">
                زانیاری پاسپۆرت
            </h1>
            <div class="grid grid-cols-3 gap-5 pb-5">
                <div>
                    <h1>
                        ناو:
                    </h1>
                    <span class="text-lg">{{ $sardanikar->name }}</span>
                </div>
                <div>
                    <h1>
                        نازناو:
                    </h1>
                    <span class="text-lg">{{ $sardanikar->nickname }}</span>
                </div>
                <div>
                    <h1>
                        ژمارەی پاسپۆرت:
                    </h1>
                    <span class="text-lg">{{ $sardanikar->passport_number }}</span>
                </div>
                <div>
                    <h1>
                        بەرواری لەدایکبوون:
                    </h1>
                    <span class="text-lg">{{ $sardanikar->birth_date }}</span>
                </div>
                <div>
                    <h1>
                        ڕەگەز:
                    </h1>
                    <span class="text-lg">{{ $sardanikar->gender ? 'نێر' : 'مێ' }}</span>
                </div>
                <div>
                    <h1>
                        نەتەوە:
                    </h1>
                    <span class="text-lg">{{ $sardanikar->nation }}</span>
                </div>
                <div>
                    <h1>
                        بەرواری بەسەرچوونی پاسپۆرت:
                    </h1>
                    <span class="text-lg">{{ $sardanikar->passport_expire_date }}</span>
                </div>
                <div>
                    <h1>
                        دەسەڵاتی دەرکردن
                    </h1>
                    <span class="text-lg">{{ $sardanikar->issuing_authority }}</span>
                </div>
            </div>
        </div>
        <div class="mt-5 space-y-5 border-b border-dashed border-gray-700 p-5 text-xl">
            <h1 class="underline decoration-green-500 decoration-2">
                زانیاری سەردانیکەر
            </h1>
            <div class="grid grid-cols-3 gap-5">
                <div>
                    <h1>
                        ژ.مۆبایل:
                    </h1>
                    <span class="text-lg">{{ $sardanikar->phone }}</span>
                </div>

                <div>
                    <h1>
                        حاڵەت</h1>
                    @if ($sardanikar->status === 'coming')
                        <span class="text-lg">هاتن</span>
                    @else
                        <span class="text-lg">ڕۆشتن</span>
                    @endif
                </div>
                <div>
                    <h1>
                        بڕی پارە</h1>
                    <span class="text-lg">{{ $sardanikar->mount_of_money }}</span>
                </div>
                <div>
                    <h1>
                        ناوی ئەو کەسەی دەچێتە لای
                    </h1>
                    <span class="text-lg">{{ $sardanikar->targeted_person }}</span>
                </div>
                <div>
                    <h1>
                        ژ.مۆبایلی ئەو کەسەی دەچیتە لای
                    </h1>
                    <span class="text-lg">{{ $sardanikar->targeted_person }}</span>
                </div>
            </div>
            <div>
                <h1>
                    مەبەستی هاتن:
                </h1>
                <span class="text-lg">{{ $sardanikar->purpose_of_coming }}</span>
            </div>
            <div>
                <h1>
                    شوێنی مانەوە
                </h1>
                <span class="text-lg">{{ $sardanikar->address }}</span>
            </div>
        </div>



    </main>

    <script>
        window.print()
        // window.close()
    </script>
</body>

</html>
