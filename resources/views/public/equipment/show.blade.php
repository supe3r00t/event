@extends('layouts.public')

@section('title', $item->name ?? 'تفاصيل')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-10">
    <div class="grid lg:grid-cols-2 gap-8">
        <div class="rounded-2xl border border-white/10 overflow-hidden bg-white/5">
            <div class="aspect-[16/10] bg-slate-900/50">
                @if(!empty($item->image))
                    <img src="{{ asset('storage/'.$item->image) }}" class="w-full h-full object-cover" alt="">
                @endif
            </div>
        </div>

        <div>
            <h1 class="text-3xl font-extrabold">{{ $item->name }}</h1>
            <p class="text-slate-300 mt-3">{{ $item->description }}</p>

            <div class="mt-6 flex gap-3">
                <a href="{{ route('public.quote.create', ['equipment_id' => $item->id]) }}"
                   class="px-5 py-3 rounded-xl bg-white text-slate-900 font-semibold">طلب عرض سعر</a>

                <a href="{{ route('public.equipment.index') }}"
                   class="px-5 py-3 rounded-xl border border-white/20 hover:bg-white/5">رجوع</a>
            </div>
        </div>
    </div>
</section>
@endsection
