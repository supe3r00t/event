<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">طلب عرض سعر</h1>
        <a href="{{ route('catalog') }}" class="text-sm underline">رجوع للمعرض</a>
    </div>

    @if (session('ok'))
        <div class="rounded-xl border border-emerald-300/40 bg-emerald-500/10 px-4 py-3">
            {{ session('ok') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="grid gap-4 rounded-2xl border border-zinc-200 dark:border-zinc-800 p-5">
        <div class="grid md:grid-cols-3 gap-4">
            <div>
                <label class="text-sm mb-1 block">اسم العميل *</label>
                <input wire:model.defer="customer_name" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-transparent px-3 py-2">
                @error('customer_name') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="text-sm mb-1 block">الجوال</label>
                <input wire:model.defer="customer_phone" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-transparent px-3 py-2">
                @error('customer_phone') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="text-sm mb-1 block">البريد</label>
                <input wire:model.defer="customer_email" type="email" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-transparent px-3 py-2">
                @error('customer_email') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="text-sm mb-1 block">من تاريخ</label>
                <input wire:model.defer="date_from" type="date" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-transparent px-3 py-2">
                @error('date_from') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="text-sm mb-1 block">إلى تاريخ</label>
                <input wire:model.defer="date_to" type="date" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-transparent px-3 py-2">
                @error('date_to') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
            </div>
        </div>

        <div>
            <label class="text-sm mb-1 block">ملاحظات</label>
            <textarea wire:model.defer="notes" rows="4" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-transparent px-3 py-2"></textarea>
            @error('notes') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="flex items-center justify-end">
            <button type="submit" class="rounded-lg bg-black text-white dark:bg-white dark:text-black px-4 py-2">
                إرسال الطلب
            </button>
        </div>
    </form>
</div>
