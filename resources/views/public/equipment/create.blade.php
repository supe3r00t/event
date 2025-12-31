@extends('layouts.public')

@section('title', 'طلب عرض سعر')

@section('content')
<section class="max-w-3xl mx-auto px-4 py-10">
    <h1 class="text-2xl font-extrabold">طلب عرض سعر</h1>
    <p class="text-slate-300 mt-1">عبّي البيانات وحدد التواريخ.</p>

    @if ($errors->any())
        <div class="mt-4 p-4 rounded-xl border border-red-500/30 bg-red-500/10 text-red-200 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <form class="mt-6 space-y-4" method="POST" action="{{ route('public.quote.store') }}">
        @csrf

        <div class="grid md:grid-cols-3 gap-3">
            <input name="customer_name" value="{{ old('customer_name') }}"
                   class="px-4 py-3 rounded-xl bg-white/5 border border-white/10 outline-none"
                   placeholder="اسم العميل *" required>

            <input name="customer_phone" value="{{ old('customer_phone') }}"
                   class="px-4 py-3 rounded-xl bg-white/5 border border-white/10 outline-none"
                   placeholder="الجوال">

            <input name="customer_email" value="{{ old('customer_email') }}"
                   class="px-4 py-3 rounded-xl bg-white/5 border border-white/10 outline-none"
                   placeholder="البريد">
        </div>

        <div class="grid md:grid-cols-2 gap-3">
            <input type="date" name="date_from" value="{{ old('date_from') }}"
                   class="px-4 py-3 rounded-xl bg-white/5 border border-white/10 outline-none">
            <input type="date" name="date_to" value="{{ old('date_to') }}"
                   class="px-4 py-3 rounded-xl bg-white/5 border border-white/10 outline-none">
        </div>

        <textarea name="notes" rows="4"
                  class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 outline-none"
                  placeholder="ملاحظات">{{ old('notes') }}</textarea>

        <button class="w-full px-5 py-3 rounded-xl bg-white text-slate-900 font-semibold">
            إرسال الطلب
        </button>
    </form>
</section>
@endsection
