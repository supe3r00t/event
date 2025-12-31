<section class="rounded-3xl p-8 bg-gradient-to-tr from-zinc-50 to-white dark:from-zinc-900 dark:to-zinc-950 border border-zinc-200 dark:border-zinc-800">
    <div class="max-w-2xl">
        <h1 class="text-3xl font-bold leading-tight">
            دايرة الحدث لتنظيم المعارض والمؤتمرات
        </h1>
        <p class="mt-3 text-zinc-600 dark:text-zinc-400">
            تصميم وتنفيذ معارض ومؤتمرات + تأجير معدات فعاليات بشكل احترافي.
        </p>

        <div class="mt-6 flex gap-2">
            <a href="{{ route('catalog') }}" class="px-4 py-2 rounded-xl text-white" style="background: var(--ec-accent)">
                تصفّح المعدات
            </a>
            <a href="{{ route('quote.request') }}" class="px-4 py-2 rounded-xl border border-zinc-300 dark:border-zinc-700">
                طلب عرض سعر
            </a>
        </div>
    </div>
</section>

<section class="mt-10">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">الأقسام</h2>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
        @foreach($categories as $cat)
            <a href="{{ route('catalog', ['category' => $cat->slug]) }}"
               class="p-4 rounded-2xl border border-zinc-200 dark:border-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-900">
                <div class="font-semibold">{{ $cat->name }}</div>
                <div class="text-xs text-zinc-500 mt-1">{{ $cat->description }}</div>
            </a>
        @endforeach
    </div>
</section>

<section class="mt-10">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">مختارات</h2>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
        @foreach($featured as $item)
            <a href="{{ route('equipment.show', $item->slug) }}"
               class="p-4 rounded-2xl border border-zinc-200 dark:border-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-900">
                <div class="font-semibold">{{ $item->name }}</div>
                <div class="text-xs text-zinc-500 mt-1">{{ $item->summary }}</div>
                <div class="mt-3 font-semibold">{{ number_format($item->price_per_day) }} ر.س / يوم</div>
            </a>
        @endforeach
    </div>
</section>
