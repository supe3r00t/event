@props(['title', 'subtitle' => null])

<div>
    <h2 class="text-xl font-extrabold">{{ $title }}</h2>
    @if($subtitle)
        <p class="text-slate-300 mt-1">{{ $subtitle }}</p>
    @endif
</div>
