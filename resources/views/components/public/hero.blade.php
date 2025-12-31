@props([
  'title' => 'تأجير معدات حفلات باحتراف',
  'subtitle' => 'اختر المعدات وحدد التواريخ… ونرجع لك بعرض سعر واضح وسريع',
  'ctaText' => 'تصفح المعدات',
  'ctaUrl' => route('public.equipment.index'),
])

<section class="relative overflow-hidden">
    <div class="absolute inset-0 opacity-60"
         style="background: radial-gradient(circle at top right, #0A4458 0%, #020617 55%, #020617 100%);"></div>

    <div class="relative max-w-6xl mx-auto px-4 py-16">
        <h1 class="text-3xl md:text-4xl font-extrabold leading-tight">{{ $title }}</h1>
        <p class="mt-3 text-slate-200 max-w-2xl">{{ $subtitle }}</p>

        <div class="mt-6 flex gap-3">
            <a href="{{ $ctaUrl }}" class="px-5 py-3 rounded-xl bg-white text-slate-900 font-semibold hover:opacity-90">
                {{ $ctaText }}
            </a>
            <a href="{{ route('public.quote.create') }}" class="px-5 py-3 rounded-xl border border-white/20 hover:bg-white/5">
                طلب عرض سعر
            </a>
        </div>
    </div>
</section>
