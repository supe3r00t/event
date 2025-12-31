@extends('layouts.public')

@section('title', 'المعدات')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-10">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold">المعدات</h1>
            <p class="text-slate-300 mt-1">اختر المعدات ثم اطلب عرض سعر بالتواريخ.</p>
        </div>

        <form class="flex gap-2" method="GET">
            <input name="q" value="{{ request('q') }}"
                   class="px-4 py-2 rounded-xl bg-white/5 border border-white/10 outline-none"
                   placeholder="بحث..." />
            <button class="px-4 py-2 rounded-xl bg-white text-slate-900 font-semibold">بحث</button>
        </form>
    </div>

    <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($items as $item)
            <x-public.equipment-card :item="$item" />
        @empty
            <div class="text-slate-300">لا توجد نتائج.</div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $items->withQueryString()->links() }}
    </div>
</section>
@endsection
