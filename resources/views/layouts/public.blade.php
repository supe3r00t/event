<!DOCTYPE html>
<html lang="ar" dir="rtl" class="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Event Circle') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen bg-white dark:bg-zinc-900 text-zinc-900 dark:text-zinc-100">

<header class="border-b border-zinc-200 dark:border-zinc-800 bg-white/80 dark:bg-zinc-900/80 backdrop-blur">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <div class="size-9 rounded-xl bg-[--ec-accent] text-white grid place-items-center font-bold">EC</div>
            <div class="leading-tight">
                <div class="font-semibold">دايرة الحدث</div>
                <div class="text-xs text-zinc-500 dark:text-zinc-400">تنظيم المعارض والمؤتمرات</div>
            </div>
        </a>

        <nav class="flex items-center gap-2">
            <a class="px-3 py-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800" href="{{ route('catalog') }}">المعدات</a>
            <a class="px-3 py-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800" href="{{ route('quote.request') }}">طلب عرض سعر</a>
        </nav>
    </div>
</header>

<main class="max-w-6xl mx-auto px-4 py-8">
    {{ $slot }}
</main>

<footer class="border-t border-zinc-200 dark:border-zinc-800">
    <div class="max-w-6xl mx-auto px-4 py-8 text-sm text-zinc-600 dark:text-zinc-400 grid gap-2">
        <div class="font-semibold text-zinc-900 dark:text-zinc-200">Event Circle — دايرة الحدث</div>
        <div>هاتف/واتساب: 0594474153</div>
        <div>الموقع: eventcircle.sa</div>
        <div class="text-xs">تأسست 2016 — تنفيذ المعارض والمؤتمرات بأسلوب احترافي</div>
    </div>
</footer>

@livewireScripts
</body>
</html>
