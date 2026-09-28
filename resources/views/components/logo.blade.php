@props(['size' => 'md', 'showText' => true])

@php
    $dimensions = match($size) {
        'xs' => 'w-7 h-7',
        'sm' => 'w-9 h-9',
        'lg' => 'w-14 h-14',
        'xl' => 'w-18 h-18',
        default => 'w-11 h-11',
    };
@endphp

<div {{ $attributes->merge(['class' => 'inline-flex items-center gap-3.5 select-none']) }}>
    <div class="{{ $dimensions }} shrink-0 relative flex items-center justify-center rounded-2xl p-1 bg-gradient-to-tr from-blue-700 via-indigo-600 to-cyan-500 shadow-lg shadow-indigo-500/20 ring-1 ring-white/20 transition-transform duration-300 hover:scale-105">
        <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="DIU SWE Logo" class="w-full h-full object-contain filter drop-shadow">
    </div>
    @if($showText)
        <div class="flex flex-col text-left">
            <span class="text-base sm:text-lg font-black tracking-tight leading-tight text-slate-900 dark:text-white flex items-center gap-2">
                Daffodil International University
            </span>
            <span class="text-xs sm:text-sm font-bold text-sky-600 dark:text-sky-400 tracking-wide flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                Dept of SWE
                <span class="text-slate-400 dark:text-slate-500 font-normal">| Routine Command Center</span>
            </span>
        </div>
    @endif
</div>
