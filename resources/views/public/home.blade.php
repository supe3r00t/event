@extends('layouts.public')

@section('title', 'الرئيسية')

@section('content')
    <x-public.hero />

    <section class="max-w-6xl mx-auto px-4 py-12">
        <x-public.section-title title="أقسام المعدات" subtitle="اختصر وقتك… اختر القسم المناسب." />
        <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($categories as $cat)
                <a href="{{ route('public.equipment.index', ['category' => $cat->id]) }}"
                   class="rounded-2xl border border-white/10 bg-white/5 p-5 hover:bg-white/10">
                    <div class="font-bold">{{ $cat->name }}</div>
                    <div class="text-sm text-slate-300 mt-1">تصفح المعدات داخل القسم</div>
                </a>
            @empty
                <div class="text-slate-300">لا توجد أقسام بعد.</div>
            @endforelse
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 pb-16">
        <x-public.section-title title="معدات مميزة" subtitle="الأكثر طلبًا." />
        <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($featured as $item)
                <x-public.equipment-card :item="$item" />
            @empty
                <div class="text-slate-300">لا توجد معدات بعد.</div>
            @endforelse
        </div>
    </section>
@endsection
