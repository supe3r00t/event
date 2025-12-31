<!doctype html>
<html lang="ar" dir="rtl" class="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    {{-- نفس فكرة Flux sidebar backdrop --}}
    <ui-sidebar-toggle
        class="z-20 fixed inset-0 bg-black/10 hidden data-flux-sidebar-on-mobile:not-data-flux-sidebar-collapsed-mobile:block"
        data-flux-sidebar-backdrop
    ></ui-sidebar-toggle>

    <div class="min-h-dvh grid grid-cols-1 lg:grid-cols-[auto_1fr] lg:[grid-template-areas:'sidebar_main']">
        {{-- Sidebar --}}
        <ui-sidebar
            class="[grid-area:sidebar] z-1 flex flex-col gap-4 [:where(&)]:w-64 p-4
                   data-flux-sidebar-collapsed-desktop:w-14 data-flux-sidebar-collapsed-desktop:px-2
                   rtl:data-flux-sidebar-collapsed-desktop:cursor-w-resize
                   max-lg:data-flux-sidebar-cloak:hidden
                   data-flux-sidebar-on-mobile:data-flux-sidebar-collapsed-mobile:-translate-x-full
                   data-flux-sidebar-on-mobile:data-flux-sidebar-collapsed-mobile:rtl:translate-x-full
                   z-20! data-flux-sidebar-on-mobile:start-0! data-flux-sidebar-on-mobile:fixed! data-flux-sidebar-on-mobile:top-0!
                   data-flux-sidebar-on-mobile:min-h-dvh! data-flux-sidebar-on-mobile:max-h-dvh!
                   max-h-dvh overflow-y-auto overscroll-contain border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900"
            x-init="$el.classList.add('transition-transform')"
            collapsible="mobile"
            stashable
            sticky
            x-data
            data-flux-sidebar-cloak
            data-flux-sidebar
        >
            {{-- Mobile toggle button --}}
            <button type="button"
                class="relative items-center justify-center h-10 w-10 inline-flex rounded-lg
                       bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15
                       text-zinc-500 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white
                       shrink-0 lg:hidden"
                x-data
                x-on:click="$dispatch('flux-sidebar-toggle')"
                aria-label="Toggle sidebar"
                data-flux-sidebar-toggle
            >
                <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M2 6.75A.75.75 0 0 1 2.75 6h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 6.75Zm0 6.5a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/>
                </svg>
            </button>

            {{-- Brand --}}
            <a href="{{ route('home') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <div class="flex aspect-square size-8 items-center justify-center rounded-md bg-accent-content text-accent-foreground">
                    <span class="text-white font-bold">A7</span>
                </div>
                <div class="ms-1 grid flex-1 text-start text-sm">
                    <span class="mb-0.5 truncate leading-tight font-semibold">آمر سبعة</span>
                </div>
            </a>

            {{-- Nav --}}
            <nav class="flex flex-col overflow-visible min-h-auto" data-flux-navlist>
                <div class="block space-y-[2px] grid">
                    <div class="px-1 py-2">
                        <div class="text-xs leading-none text-zinc-400">الواجهة العامة</div>
                    </div>

                    <div class="space-y-1">
                        <a href="{{ route('home') }}"
                           class="h-10 lg:h-8 relative flex items-center gap-3 rounded-lg py-0 text-start w-full px-3
                                  text-zinc-500 dark:text-white/80 hover:text-zinc-800 dark:hover:text-white
                                  hover:bg-zinc-800/5 dark:hover:bg-white/[7%] border border-transparent"
                           wire:navigate>
                            <span class="text-sm font-medium">الرئيسية</span>
                        </a>

                        <a href="{{ route('catalog') }}"
                           class="h-10 lg:h-8 relative flex items-center gap-3 rounded-lg py-0 text-start w-full px-3
                                  text-zinc-500 dark:text-white/80 hover:text-zinc-800 dark:hover:text-white
                                  hover:bg-zinc-800/5 dark:hover:bg-white/[7%] border border-transparent"
                           wire:navigate>
                            <span class="text-sm font-medium">المعدات</span>
                        </a>

                        <a href="{{ route('quote.request') }}"
                           class="h-10 lg:h-8 relative flex items-center gap-3 rounded-lg py-0 text-start w-full px-3
                                  text-zinc-500 dark:text-white/80 hover:text-zinc-800 dark:hover:text-white
                                  hover:bg-zinc-800/5 dark:hover:bg-white/[7%] border border-transparent"
                           wire:navigate>
                            <span class="text-sm font-medium">طلب عرض سعر</span>
                        </a>

                        <a href="{{ route('public.company.profile') }}"
                           class="h-10 lg:h-8 relative flex items-center gap-3 rounded-lg py-0 text-start w-full px-3
                                  text-zinc-500 dark:text-white/80 hover:text-zinc-800 dark:hover:text-white
                                  hover:bg-zinc-800/5 dark:hover:bg-white/[7%] border border-transparent"
                           wire:navigate>
                            <span class="text-sm font-medium">بروفايل الشركة</span>
                        </a>
                    </div>
                </div>
            </nav>

            <div class="flex-1" data-flux-spacer></div>

            {{-- Footer links --}}
            <nav class="flex flex-col overflow-visible min-h-auto" data-flux-navlist>
                <a href="{{ route('dashboard') }}"
                   class="h-10 lg:h-8 relative flex items-center gap-3 rounded-lg py-0 text-start w-full px-3
                          text-zinc-500 dark:text-white/80 hover:text-zinc-800 dark:hover:text-white
                          hover:bg-zinc-800/5 dark:hover:bg-white/[7%] border border-transparent">
                    <span class="text-sm font-medium">لوحة التحكم</span>
                </a>
            </nav>
        </ui-sidebar>

        {{-- Main --}}
        <div class="[grid-area:main] p-6 lg:p-8 [[data-flux-container]_&]:px-0" data-flux-main>
            {{ $slot }}
        </div>
    </div>

    {{-- Flux + Livewire --}}
    <script src="{{ url('/flux/flux.js') }}" data-navigate-once></script>
    @livewireScripts
</body>
</html>
