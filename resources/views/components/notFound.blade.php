@props(['message' => 'هیچ زانیاریەک نەدۆزرایەوە'])
<div class="m-16 flex flex-col items-center justify-center space-y-5">
    <img src="{{ asset('assets/img/notfound.svg') }}" class="w-80 object-cover object-center text-center" alt="">
    <p class="text-center text-xl text-slate-500">{{ $message }}</p>
</div>
