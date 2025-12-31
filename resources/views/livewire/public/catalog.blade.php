<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">كتالوج المعدات</h1>

        <a href="{{ route('quote.request') }}"
           class="px-4 py-2 rounded-xl text-white"
           style="background: var(--ec-accent)">
            السلة ({{ $draft->items_count }})
        </a>
    </div>

    <div class="flex gap-2 flex-wrap">
        <a href="{{ route('catalog') }}"
           class="px-3 py-1.5 rounded-xl border {{ request('category') ? 'border-zinc-300' : 'border-zinc-900' }}">
            الكل
        </a>

        @foreach($categories as $c)
            <a href="{{ route('catalog', ['category' => $c->slug]) }}"
               class="px-3 py-1.5 rounded-xl border border-zinc-300">
                {{ $c->name }}
            </a>
        @endforeach
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
        @foreach($equipments as $e)
            <div class="p-4 rounded-2xl border border-zinc-200 dark:border-zinc-800">
                <div class="font-semibold">{{ $e->name }}</div>
                <div class="text-xs text-zinc-500 mt-1">{{ $e->summary }}</div>
                <div class="mt-3 font-semibold">{{ number_format($e->price_per_day) }} ر.س / يوم</div>

                <button wire:click="addToQuote({{ $e->id }})"
                        class="mt-4 w-full px-4 py-2 rounded-xl text-white"
                        style="background: var(--ec-accent)">
                    إضافة للسلة
                </button>
            </div>
        @endforeach
    </div>

    <div>
        {{ $equipments->links() }}
    </div>
</div>
