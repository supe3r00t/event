<!doctype html>
<html lang="ar" dir="rtl" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>دايرة الحدث</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        :root { --ec-accent: #0A4458; } /* غيره للون شعارك */
    </style>

    @livewireStyles
</head>
<body class="min-h-screen bg-white dark:bg-zinc-900 text-zinc-900 dark:text-white">
    <header class="border-b border-zinc-200 dark:border-zinc-800">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-bold">دايرة الحدث</a>
            <nav class="flex gap-2">
                <a href="{{ route('catalog') }}" class="px-3 py-1 rounded-xl border">المعدات</a>
                <a href="{{ route('quote.request') }}" class="px-3 py-1 rounded-xl text-white" style="background:var(--ec-accent)">عرض سعر</a>
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-6">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
