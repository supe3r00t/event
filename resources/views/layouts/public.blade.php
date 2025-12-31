<!doctype html>
<html lang="ar" dir="rtl" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Event Circle' }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles

    <style>
        :root { --ec-accent: #2E5192; }
    </style>
</head>
<body class="min-h-screen bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-50">
    <header class="sticky top-0 z-50 border-b border-zinc-200/70 dark:border-zinc-800/70 bg-white/80 dark:bg-zinc-950/70 backdrop-blur">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between gap-3">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="/images/logo.png" class="h-10 w-auto" alt="Event Circle">
                <div class="leading-tight">
                    <div class="font-bold">دائرة الحدث</div>
                    <div class="text-xs text-zinc-500 dark:text-zinc-400">Event Circle</div>
                </div>
            </a>

            <nav class="flex items-center gap-2">
                <a href="{{ route('catalog') }}" class="px-3 py-2 rounded-xl hover:bg-zinc-100 dark:hover:bg-zinc-900">المعدات</a>
                <a href="{{ route('quote.request') }}" class="px-3 py-2 rounded-xl border border-zinc-200 dark:border-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-900">
                    طلب عرض سعر
                </a>
                <a href="https://wa.me/966594474153" target="_blank"
                   class="px-3 py-2 rounded-xl text-white"
                   style="background: var(--ec-accent)">
                    واتساب
                </a>
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <footer class="border-t border-zinc-200 dark:border-zinc-800">
        <div class="max-w-6xl mx-auto px-4 py-6 text-sm text-zinc-600 dark:text-zinc-400 flex flex-col gap-1">
            <div>Event Circle Company for Exhibition and Conference Organization</div>
            <div>الموقع: eventcircle.sa — واتساب: 0594474153</div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
