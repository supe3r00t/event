<header class="sticky top-0 z-50 backdrop-blur bg-slate-950/70 border-b border-white/10">
    <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
        <a href="{{ url('/') }}" class="font-bold text-lg tracking-tight">
            <span class="text-white">{{ config('app.name', 'Event') }}</span>
        </a>

        <nav class="flex gap-4 text-sm text-slate-200">
            <a class="hover:text-white" href="{{ url('/') }}">الرئيسية</a>
            <a class="hover:text-white" href="{{ route('public.equipment.index') }}">المعدات</a>
            <a class="hover:text-white" href="{{ route('public.projects.index') }}">الأعمال</a>
            <a class="hover:text-white" href="{{ route('public.quote.create') }}">طلب عرض سعر</a>
        </nav>
    </div>
</header>
