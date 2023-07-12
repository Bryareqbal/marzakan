<section class="mt-6 rounded-lg bg-white p-3">
    <div class="flex items-center space-x-4 space-x-reverse">
        <span class="h-3 w-3 rounded bg-green-600">
        </span>
        <h1 class="underline decoration-green-600 decoration-2 underline-offset-8">
            گۆرینی وشەی نهێنی
        </h1>
    </div>
    <form method="POST" action="{{ route('editPassword', $user->id) }}" class="mt-6 max-w-6xl">
        @csrf
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">


            <div class="flex flex-col space-y-3">
                <fieldset class="rounded-lg border-2 border-green-500 p-2">
                    <legend class="px-2"> وشەی نهێنی ئێستا</legend>
                    <x-input class="w-full" type="password" name="current_password" id="current_password"
                        value="{{ old('current_password') }}" />
                    <x-error message="current_password" />
                </fieldset>
            </div>
            <div class="flex flex-col space-y-3">
                <fieldset class="rounded-lg border-2 border-green-500 p-2">
                    <legend class="px-2"> وشەی نهێنی</legend>
                    <x-input class="w-full" type="password" name="newPassword" id="newPassword"
                        value="{{ old('newPassword') }}" />
                    <x-error message="newPassword" />
                </fieldset>
            </div>
            <div class="flex flex-col space-y-3">
                <fieldset class="rounded-lg border-2 border-green-500 p-2">
                    <legend class="px-2"> دڵنیاکردنەوەی وشەی نهێنی</legend>
                    <x-input class="w-full" name="password_confirmation" type="password"
                        value="{{ old('password_confirmation') }}" />
                    <x-error message="password_confirmation" />
                </fieldset>
            </div>

        </div>
        <div class="mt-6 flex justify-end">
            <button type="submit" class="flex items-center space-x-1 space-x-reverse focus:outline-none">
                <span
                    class="flex h-8 w-8 items-center justify-center rounded rounded-br-md rounded-tr-md border shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>
                </span>
                <div
                    class="flex items-center space-x-3 space-x-reverse rounded-bl-md rounded-tl-md bg-gradient-to-br from-green-500 to-green-600 py-1 px-6 text-white">
                    <span>نوێکردنەوە</span>
                </div>
            </button>
        </div>
        <hr class="mt-4 max-w-4xl border border-dashed border-slate-500">
    </form>
</section>
