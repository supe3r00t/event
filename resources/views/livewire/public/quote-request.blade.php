<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">طلب عرض سعر</h1>
        <a href="{{ route('catalog') }}" class="px-4 py-2 rounded-xl border">رجوع للكتالوج</a>
    </div>

    <div class="grid lg:grid-cols-3 gap-4">
        <div class="lg:col-span-2 space-y-3">
            @forelse($draft->items as $it)
                <div class="p-4 rounded-2xl border border-zinc-200 dark:border-zinc-800 flex items-center justify-between gap-3">
                    <div class="min-w-0">
                        <div class="font-semibold">{{ $it->equipment?->name }}</div>
                        <div class="text-xs text-zinc-500">
                            {{ number_format($it->equipment?->price_per_day ?? 0) }} ر.س / يوم
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <button wire:click="dec({{ $it->id }})" class="px-3 py-1 rounded-lg border">-</button>
                        <div class="w-10 text-center font-semibold">{{ $it->qty }}</div>
                        <button wire:click="inc({{ $it->id }})" class="px-3 py-1 rounded-lg border">+</button>

                        <button wire:click="remove({{ $it->id }})"
                                class="px-3 py-1 rounded-lg border border-red-300 text-red-600">
                            حذف
                        </button>
                    </div>
                </div>
            @empty
                <div class="p-6 rounded-2xl border border-zinc-200 dark:border-zinc-800 text-zinc-500">
                    السلة فاضية — روح للكتالوج وأضف معدات.
                </div>
            @endforelse
        </div>

        <div class="p-4 rounded-2xl border border-zinc-200 dark:border-zinc-800 space-y-3">
            <div class="font-semibold">بيانات العميل</div>

            <input wire:model="customer_name" class="w-full rounded-xl border p-2" placeholder="الاسم *">
            <input wire:model="customer_phone" class="w-full rounded-xl border p-2" placeholder="الجوال *">
            <input wire:model="customer_email" class="w-full rounded-xl border p-2" placeholder="الإيميل (اختياري)">
            <input wire:model="city" class="w-full rounded-xl border p-2" placeholder="المدينة (اختياري)">
            <textarea wire:model="address" class="w-full rounded-xl border p-2" placeholder="العنوان (اختياري)"></textarea>

            <div class="grid grid-cols-2 gap-2">
                <input type="date" wire:model="date_from" class="w-full rounded-xl border p-2">
                <input type="date" wire:model="date_to" class="w-full rounded-xl border p-2">
            </div>

            <textarea wire:model="notes" class="w-full rounded-xl border p-2" placeholder="ملاحظات"></textarea>

            <div class="flex items-center justify-between pt-2">
                <div class="text-sm text-zinc-500">الإجمالي التقريبي</div>
                <div class="font-bold">{{ number_format($draft->total_estimate ?? 0) }} ر.س</div>
            </div>

            <button wire:click="submit"
                    class="w-full px-4 py-2 rounded-xl text-white"
                    style="background: var(--ec-accent)">
                إرسال الطلب
            </button>
        </div>
    </div>
</div>
