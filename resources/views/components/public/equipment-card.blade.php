@props(['item'])

<a href="{{ route('public.equipment.show', $item) }}"
   class="block rounded-2xl border border-white/10 bg-white/5 hover:bg-white/10 transition overflow-hidden">
    <div class="aspect-[16/10] bg-slate-900/50">
        @if(!empty($item->image))
            <img src="{{ asset('storage/'.$item->image) }}" class="w-full h-full object-cover" alt="">
        @endif
    </div>

    <div class="p-4">
        <div class="font-bold text-white">{{ $item->name ?? '—' }}</div>
        <div class="text-sm text-slate-300 mt-1 line-clamp-2">{{ $item->description ?? '' }}</div>

        <div class="mt-3 flex items-center justify-between text-sm">
            <span class="text-slate-300">{{ $item->price_per_day ? $item->price_per_day.' / يوم' : 'سعر حسب الطلب' }}</span>
            <span class="text-white/80">عرض التفاصيل →</span>
        </div>
    </div>
</a>
