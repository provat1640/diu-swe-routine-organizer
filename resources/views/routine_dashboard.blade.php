<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daffodil International University • Dept of SWE • Weekly Routine Organizer</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="alternate icon" href="{{ asset('favicon.ico') }}">

    <!-- Tailwind CSS with Dark/Light Support -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#2563eb',
                            600: '#1d4ed8',
                            700: '#1e40af',
                            800: '#1e3a8a',
                            900: '#0f2b5c',
                            950: '#091836',
                        },
                        diu: {
                            navy: '#0b162c',
                            card: '#11213f',
                            accent: '#0284c7',
                            gold: '#f59e0b',
                            emerald: '#10b981',
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Inter', 'system-ui', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(148, 163, 184, 0.25); border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(148, 163, 184, 0.45); }

        /* Print Layout Rules */
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; color: #0f172a !important; font-size: 11pt; }
            .print-only { display: block !important; }
            .print-card {
                border: 1px solid #cbd5e1 !important;
                background: white !important;
                color: #0f172a !important;
                box-shadow: none !important;
                page-break-inside: avoid;
            }
            .print-table {
                width: 100% !important;
                border-collapse: collapse !important;
            }
            .print-table th, .print-table td {
                border: 1px solid #94a3b8 !important;
                padding: 6px 8px !important;
                color: #0f172a !important;
            }
            .print-table th {
                background: #f1f5f9 !important;
                font-weight: bold !important;
            }
            @page {
                size: landscape;
                margin: 12mm;
            }
        }

        .print-only { display: none; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 dark:bg-[#070d18] dark:text-slate-100 min-h-screen antialiased flex flex-col selection:bg-sky-500 selection:text-white transition-colors duration-200">

    <!-- Theme State Initializer -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('diu_theme');
            if (savedTheme === 'light') {
                document.documentElement.classList.remove('dark');
            } else {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <!-- Top Urgent Campus Ticker / Notification Bar -->
    @if(session('status'))
        <div class="no-print bg-emerald-600 text-white text-xs sm:text-sm font-semibold px-4 py-2.5 text-center shadow-md flex items-center justify-center gap-2">
            <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    <!-- Official Top Bar: Campus Details & Real-time Clock -->
    <div class="no-print bg-slate-900/90 dark:bg-[#0b1329] border-b border-slate-800 text-xs text-slate-300 py-2 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-1.5 font-semibold text-sky-400">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Daffodil Smart City (DSC), Ashulia, Dhaka
                </span>
                <span class="hidden md:inline text-slate-600">|</span>
                <span class="hidden md:inline text-slate-400">Faculty of Science & Information Technology (FSIT)</span>
            </div>
            <div class="flex items-center gap-4 text-xs font-medium">
                <span class="inline-flex items-center gap-1.5 text-emerald-400">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Fall 2026 Routine • Effective: 19 Sept, 2026
                </span>
                <span id="liveClock" class="font-mono text-slate-400"></span>
            </div>
        </div>
    </div>

    <!-- Main Realistic Portal Header -->
    <header class="no-print sticky top-0 z-40 bg-slate-900/95 dark:bg-[#0e172e]/95 backdrop-blur-md border-b border-slate-800 shadow-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20 sm:h-24">
                
                <!-- University Title & Subtitle with Official SVG Logo -->
                <a href="{{ route('routine.index') }}" class="flex items-center gap-3 sm:gap-4 group focus:outline-none">
                    <!-- High-Resolution Official SVG Logo -->
                    <div class="w-12 h-12 sm:w-14 sm:h-14 shrink-0 rounded-2xl bg-gradient-to-tr from-blue-700 via-indigo-600 to-sky-400 p-1 shadow-lg shadow-indigo-600/30 group-hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="DIU SWE Logo" class="w-full h-full object-contain filter drop-shadow">
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="px-2 py-0.5 rounded text-[10px] font-extrabold uppercase tracking-wider bg-sky-500/10 text-sky-400 border border-sky-500/20">Official Portal</span>
                            <span class="text-xs text-slate-400 font-medium hidden sm:inline">Autonomous Routine Engine</span>
                        </div>
                        <h1 class="text-lg sm:text-2xl font-black tracking-tight text-white group-hover:text-sky-300 transition leading-tight">
                            Daffodil International University
                        </h1>
                        <h2 class="text-xs sm:text-sm font-bold text-sky-400 tracking-wide flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            Dept of SWE
                            <span class="text-slate-400 font-normal hidden sm:inline">• Department of Software Engineering</span>
                        </h2>
                    </div>
                </a>

                <!-- Header Actions: Theme Switcher & Quick Download -->
                <div class="flex items-center gap-2 sm:gap-3">
                    
                    <!-- Theme Switcher Button -->
                    <button id="themeToggleBtn" onclick="toggleTheme()" type="button" title="Toggle Light / Dark Theme" class="p-2.5 rounded-xl border border-slate-700/80 bg-slate-800/80 hover:bg-slate-700 text-slate-200 hover:text-white transition shadow-sm">
                        <!-- Sun Icon (shown in dark mode) -->
                        <svg id="themeIconSun" class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <!-- Moon Icon (hidden by default) -->
                        <svg id="themeIconMoon" class="w-5 h-5 text-sky-300 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    </button>

                    <!-- Download Dropdown Button -->
                    <div class="relative group">
                        <button type="button" class="inline-flex items-center gap-2 bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 text-white font-bold text-xs sm:text-sm px-4 py-2.5 rounded-xl shadow-lg shadow-sky-500/25 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            <span>Download Routine</span>
                            <svg class="w-3.5 h-3.5 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute right-0 mt-2 w-56 bg-slate-900 border border-slate-700/80 rounded-2xl shadow-2xl p-2 hidden group-hover:block hover:block z-50 animate-in fade-in slide-in-from-top-1 duration-150">
                            <div class="px-3 py-1.5 text-[11px] font-bold uppercase tracking-wider text-slate-400 border-b border-slate-800">
                                Batch {{ $batch }}-{{ $section }} Export Options
                            </div>
                            <button onclick="window.print()" class="w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-slate-200 hover:bg-slate-800 hover:text-sky-300 transition">
                                <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                <span>Download PDF / Print</span>
                            </button>
                            <a href="{{ route('routine.export.csv', ['batch' => $batch, 'section' => $section, 'major_track' => $track]) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-slate-200 hover:bg-slate-800 hover:text-emerald-300 transition">
                                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                <span>Download Excel / CSV</span>
                            </a>
                            <a href="{{ route('routine.export.ics', ['batch' => $batch, 'section' => $section, 'major_track' => $track]) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-slate-200 hover:bg-slate-800 hover:text-violet-300 transition">
                                <svg class="w-4 h-4 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>Download Calendar (.ics)</span>
                            </a>
                        </div>
                    </div>

                    <!-- Direct Android Mobile Sync Link -->
                    <a href="{{ route('api.v1.android-sync', ['feature' => 'meta']) }}" target="_blank" class="hidden lg:flex items-center gap-2 bg-slate-800/80 hover:bg-slate-700 text-slate-200 hover:text-white text-xs font-bold px-3 py-2.5 rounded-xl border border-slate-700/80 transition shadow-sm">
                        <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 24 24"><path d="M17.523 15.3414c-.5511 0-.9993-.4486-.9993-.9997s.4482-.9993.9993-.9993c.551 0 .9993.4482.9993.9993.0001.5511-.4482.9997-.9993.9997m-11.046 0c-.5511 0-.9993-.4486-.9993-.9997s.4482-.9993.9993-.9993c.5511 0 .9993.4482.9993.9993 0 .5511-.4482.9997-.9993.9997m11.4045-6.02l1.9973-3.4592a.416.416 0 00-.1521-.5676.416.416 0 00-.5676.1521l-2.0223 3.503C15.5902 8.4116 13.8533 8.125 12 8.125s-3.5902.2866-5.1368.8247L4.8409 5.4467a.4161.4161 0 00-.5677-.1521.4157.4157 0 00-.1521.5676l1.9973 3.4592C2.6889 11.1867.3432 14.6589 0 18.7844h24c-.3432-4.1255-2.6889-7.5977-6.1185-9.463"></path></svg>
                        <span>Android Sync</span>
                    </a>
                </div>
            </div>

            <!-- Tab Navigation Bar with Counter Badges -->
            <nav class="flex space-x-1 sm:space-x-3 border-t border-slate-800 overflow-x-auto py-2.5 scrollbar-none">
                <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => $viewMode]) }}" class="px-3.5 py-2 rounded-xl text-xs sm:text-sm font-bold transition flex items-center gap-2 whitespace-nowrap {{ $activeTab === 'routine' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Weekly Routine Matrix</span>
                </a>
                <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $facultyQuery ?? 'MRA']) }}" class="px-3.5 py-2 rounded-xl text-xs sm:text-sm font-bold transition flex items-center gap-2 whitespace-nowrap {{ $activeTab === 'faculty' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span>Faculty Directory & Schedules</span>
                    <span class="bg-indigo-900/60 text-indigo-300 text-[11px] px-2 py-0.5 rounded-full font-mono">{{ count($facultyDirectory) }}</span>
                </a>
                <a href="{{ route('routine.index', ['tab' => 'empty_rooms', 'empty_day' => $emptyDay, 'empty_slot' => $emptySlot]) }}" class="px-3.5 py-2 rounded-xl text-xs sm:text-sm font-bold transition flex items-center gap-2 whitespace-nowrap {{ $activeTab === 'empty_rooms' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    <span>Empty Room Tracker</span>
                    <span class="bg-emerald-500/20 text-emerald-300 text-[11px] px-2 py-0.5 rounded-full border border-emerald-500/30 font-mono">{{ $roomAnalysis['available_count'] }} Free</span>
                </a>
                <a href="{{ route('routine.index', ['tab' => 'custom']) }}" class="px-3.5 py-2 rounded-xl text-xs sm:text-sm font-bold transition flex items-center gap-2 whitespace-nowrap {{ $activeTab === 'custom' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    <span>Custom Routine Builder</span>
                    @if(count($customSlotIds) > 0)
                        <span class="bg-sky-500 text-white text-[11px] px-2 py-0.5 rounded-full font-mono">{{ count($customSlotIds) }}</span>
                    @endif
                </a>
                <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => $offeringBatch]) }}" class="px-3.5 py-2 rounded-xl text-xs sm:text-sm font-bold transition flex items-center gap-2 whitespace-nowrap {{ $activeTab === 'offerings' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <span>Course Offerings</span>
                    <span class="bg-slate-800 text-slate-300 text-[11px] px-2 py-0.5 rounded-full font-mono">{{ $offerings->count() }}</span>
                </a>
            </nav>
        </div>
    </header>

    <!-- PRINT-ONLY OFFICIAL HEADER (Appears only on window.print / PDF) -->
    <div class="print-only p-6 border-b-2 border-slate-900 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="Logo" class="w-16 h-16 object-contain">
                <div>
                    <h1 class="text-2xl font-black uppercase tracking-tight text-slate-950">Daffodil International University</h1>
                    <h2 class="text-base font-bold text-slate-800">Department of Software Engineering (Dept of SWE)</h2>
                    <p class="text-xs text-slate-600">Daffodil Smart City (DSC), Ashulia, Dhaka • Class Routine (Fall 2026 Session)</p>
                </div>
            </div>
            <div class="text-right text-xs">
                <div class="font-extrabold text-sm text-slate-900">Batch {{ $batch }} • Section {{ $section }}</div>
                @if($track)<div class="font-bold text-slate-700">Track: {{ $track }}</div>@endif
                <div class="text-slate-500 mt-1">Effective: Sept 19, 2026</div>
                <div class="text-[10px] text-slate-400">Printed: {{ date('d M Y, h:i A') }}</div>
            </div>
        </div>
    </div>

    <!-- Main Container Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 flex-1 w-full">

        {{-- ============================================================== --}}
        {{-- TAB 1: WEEKLY ROUTINE MATRIX (DEFAULT)                         --}}
        {{-- ============================================================== --}}
        @if($activeTab === 'routine')
            <div class="space-y-6">

                <!-- Filter & View Switch Toolbar Card -->
                <div class="no-print bg-slate-900/90 dark:bg-[#0d162d] border border-slate-800/90 rounded-2xl p-5 sm:p-6 shadow-xl relative overflow-hidden backdrop-blur-sm">
                    <div class="absolute -right-20 -top-20 w-72 h-72 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>
                    <form method="GET" action="{{ route('routine.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end relative z-10">
                        <input type="hidden" name="tab" value="routine">
                        <input type="hidden" name="view_mode" value="{{ $viewMode }}">

                        <!-- Batch Selector -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                Academic Batch
                            </label>
                            <select name="batch" onchange="this.form.submit()" class="w-full bg-slate-800/90 dark:bg-[#131f3d] border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-sky-500 transition text-sm">
                                @foreach($availableBatches as $b)
                                    <option value="{{ $b }}" {{ $batch == $b ? 'selected' : '' }}>
                                        Batch {{ $b }} @if($b == 41) (Major Tracks) @elseif($b == 40) (Graduating) @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Section Selector -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                                Section
                            </label>
                            @php
                                $maxSection = $batch === 40 ? 'F' : ($batch === 41 ? 'L' : (in_array($batch, [43, 44, 45]) ? 'N' : 'M'));
                                $sectionsList = range('A', $maxSection);
                            @endphp
                            <select name="section" onchange="this.form.submit()" class="w-full bg-slate-800/90 dark:bg-[#131f3d] border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-sky-500 transition text-sm">
                                @foreach($sectionsList as $sec)
                                    <option value="{{ $sec }}" {{ $section === $sec ? 'selected' : '' }}>
                                        Section {{ $sec }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Track Selector (Batch 41 specific) -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                Major Specialization Track
                            </label>
                            <select name="major_track" onchange="this.form.submit()" class="w-full bg-slate-800/90 dark:bg-[#131f3d] border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-sky-500 transition text-sm {{ $batch !== 41 ? 'opacity-50' : '' }}">
                                <option value="">All / Core Syllabus</option>
                                <option value="SE" {{ $track === 'SE' ? 'selected' : '' }}>SE • Software Engineering</option>
                                <option value="DS" {{ $track === 'DS' ? 'selected' : '' }}>DS • Data Science</option>
                                <option value="RE" {{ $track === 'RE' ? 'selected' : '' }}>RE • Robotics & Embedded</option>
                                <option value="ST" {{ $track === 'ST' ? 'selected' : '' }}>ST • Software Testing</option>
                                <option value="CS" {{ $track === 'CS' ? 'selected' : '' }}>CS • Cyber Security</option>
                            </select>
                        </div>

                        <!-- Load Routine & View Toggle -->
                        <div class="flex items-center gap-2">
                            <button type="submit" class="flex-1 bg-sky-500 hover:bg-sky-400 text-slate-950 font-black px-4 py-2.5 rounded-xl transition shadow-lg shadow-sky-500/20 text-sm flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                <span>Load Schedule</span>
                            </button>
                            <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => $viewMode === 'grid' ? 'cards' : 'grid']) }}" title="Switch between Weekly Matrix Grid and Day Cards" class="p-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white border border-slate-700 transition">
                                @if($viewMode === 'grid')
                                    <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" title="Switch to Cards View"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                @else
                                    <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" title="Switch to Weekly Timetable Grid"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                @endif
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Active Filter Summary & Download Bar -->
                <div class="flex flex-wrap items-center justify-between gap-4 bg-slate-900/60 dark:bg-[#0c142b]/70 border border-slate-800 rounded-2xl px-5 py-3.5 backdrop-blur-sm">
                    <div class="flex flex-wrap items-center gap-2 sm:gap-3 text-xs sm:text-sm">
                        <span class="font-extrabold text-white text-base">Batch {{ $batch }}-{{ $section }}</span>
                        @if($track)
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-indigo-500/20 text-indigo-300 border border-indigo-500/30">Track: {{ $track }}</span>
                        @endif
                        <span class="text-slate-500">•</span>
                        <span class="text-slate-300 font-medium">
                            Total Assigned Slots: <strong class="text-sky-400">{{ $routines->flatten(1)->count() }} classes</strong>
                        </span>
                        <span class="text-slate-500">•</span>
                        <span class="text-slate-400 text-xs">
                            Active View: <strong class="text-white">{{ $viewMode === 'grid' ? 'Weekly Timetable Grid' : 'Day-by-Day Cards' }}</strong>
                        </span>
                    </div>

                    <div class="no-print flex items-center gap-2">
                        <!-- Switch View Mode Pill -->
                        <div class="inline-flex rounded-xl bg-slate-800/80 p-1 border border-slate-700/60 text-xs font-bold">
                            <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => 'grid']) }}" class="px-3 py-1.5 rounded-lg transition {{ $viewMode === 'grid' ? 'bg-sky-500 text-slate-950 font-black shadow' : 'text-slate-300 hover:text-white' }}">
                                Timetable Grid
                            </a>
                            <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => 'cards']) }}" class="px-3 py-1.5 rounded-lg transition {{ $viewMode === 'cards' ? 'bg-sky-500 text-slate-950 font-black shadow' : 'text-slate-300 hover:text-white' }}">
                                Day Cards
                            </a>
                        </div>

                        <!-- Download PDF / Print -->
                        <button onclick="window.print()" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold border border-slate-700 transition shadow-sm">
                            <svg class="w-3.5 h-3.5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            <span>Print / PDF</span>
                        </button>

                        <!-- Download CSV -->
                        <a href="{{ route('routine.export.csv', ['batch' => $batch, 'section' => $section, 'major_track' => $track]) }}" title="Download as CSV spreadsheet" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold border border-slate-700 transition shadow-sm">
                            <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span>CSV</span>
                        </a>

                        <!-- Download ICS -->
                        <a href="{{ route('routine.export.ics', ['batch' => $batch, 'section' => $section, 'major_track' => $track]) }}" title="Import to Google/Apple Calendar" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold border border-slate-700 transition shadow-sm">
                            <svg class="w-3.5 h-3.5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>ICS</span>
                        </a>
                    </div>
                </div>

                {{-- ========================================================== --}}
                {{-- VIEW OPTION A: WEEKLY TIMETABLE GRID MATRIX (RECOMMENDED)   --}}
                {{-- ========================================================== --}}
                @if($viewMode === 'grid')
                    <div class="overflow-hidden rounded-2xl border border-slate-800 bg-slate-900/80 dark:bg-[#0c142b] shadow-2xl">
                        <div class="overflow-x-auto">
                            <table class="w-full border-collapse text-left text-xs sm:text-sm print-table">
                                <thead>
                                    <tr class="border-b border-slate-800 bg-slate-950/80 dark:bg-[#070d18] text-slate-300">
                                        <th class="p-3.5 sm:p-4 font-black uppercase tracking-wider text-sky-400 border-r border-slate-800 w-28 shrink-0">
                                            Day / Time
                                        </th>
                                        @foreach($timeSlots as $slot)
                                            <th class="p-3.5 sm:p-4 font-bold text-center border-r border-slate-800 last:border-r-0 min-w-[170px]">
                                                <div class="text-white font-extrabold">{{ $slot['label'] }}</div>
                                                <div class="text-[11px] font-normal text-slate-400">90 Mins Slot</div>
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-800/80">
                                    @php
                                        $academicDays = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
                                    @endphp
                                    @foreach($academicDays as $day)
                                        <tr class="hover:bg-slate-850/40 dark:hover:bg-[#101b38]/50 transition-colors">
                                            <!-- Day Header Cell -->
                                            <td class="p-3.5 sm:p-4 font-black text-slate-100 bg-slate-900/90 dark:bg-[#0a1124] border-r border-slate-800 align-top">
                                                <div class="text-base text-sky-400 font-black tracking-wide">{{ $day }}</div>
                                                @php
                                                    $dayCount = isset($routines[$day]) ? $routines[$day]->count() : 0;
                                                @endphp
                                                <div class="mt-1 text-[11px] font-medium text-slate-400">
                                                    {{ $dayCount }} {{ Str::plural('class', $dayCount) }}
                                                </div>
                                            </td>

                                            <!-- Time Slots Columns -->
                                            @foreach($timeSlots as $slot)
                                                @php
                                                    $slotClasses = $weeklyGrid[$day][$slot['label']] ?? [];
                                                @endphp
                                                <td class="p-2 sm:p-2.5 border-r border-slate-800/70 last:border-r-0 align-top min-w-[170px]">
                                                    @if(!empty($slotClasses))
                                                        <div class="space-y-2">
                                                            @foreach($slotClasses as $cls)
                                                                @php
                                                                    $faculty = App\Services\FacultyService::getFaculty($cls->teacher_initials);
                                                                    $isCustom = in_array($cls->id, $customSlotIds);
                                                                @endphp
                                                                <div class="group relative rounded-xl border border-slate-700/80 bg-slate-800/90 dark:bg-[#131f3d] p-3 shadow-md hover:border-sky-400 hover:shadow-sky-500/10 transition-all duration-200 print-card">
                                                                    <!-- Course Code & Track Badge -->
                                                                    <div class="flex items-center justify-between gap-1.5 mb-1.5">
                                                                        <span class="font-black text-sm text-white tracking-wide text-sky-300">
                                                                            {{ $cls->course_id }}
                                                                        </span>
                                                                        @if($cls->major_track)
                                                                            <span class="text-[10px] font-extrabold uppercase px-1.5 py-0.5 rounded bg-amber-400/15 text-amber-300 border border-amber-400/30">
                                                                                {{ $cls->major_track }}
                                                                            </span>
                                                                        @endif
                                                                    </div>

                                                                    <!-- Faculty Initials & Full Name -->
                                                                    <div class="mb-2">
                                                                        <div class="flex items-center gap-1.5 text-xs font-bold text-white">
                                                                            <span class="px-1.5 py-0.5 rounded bg-indigo-500/20 text-indigo-300 font-mono text-[11px] border border-indigo-500/30">
                                                                                {{ $cls->teacher_initials }}
                                                                            </span>
                                                                            <span class="truncate" title="{{ $faculty['name'] }} ({{ $faculty['designation'] }})">
                                                                                {{ $faculty['name'] }}
                                                                            </span>
                                                                        </div>
                                                                        <div class="text-[10px] text-slate-400 truncate pl-0.5" title="{{ $faculty['designation'] }}">
                                                                            {{ $faculty['designation'] }}
                                                                        </div>
                                                                    </div>

                                                                    <!-- Classroom & Building -->
                                                                    <div class="flex items-center justify-between text-[11px] pt-1.5 border-t border-slate-700/60 text-slate-300">
                                                                        <span class="inline-flex items-center gap-1 font-semibold text-emerald-400">
                                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                                                            {{ $cls->classroom_no }}
                                                                        </span>
                                                                        <span class="text-slate-400 text-[10px] font-mono">
                                                                            {{ $cls->building }}
                                                                        </span>
                                                                    </div>

                                                                    <!-- Toggle Custom Slot Quick Action -->
                                                                    <div class="no-print mt-2 pt-1.5 flex items-center justify-between border-t border-slate-700/40">
                                                                        <form method="POST" action="{{ route('custom.toggle') }}">
                                                                            @csrf
                                                                            <input type="hidden" name="slot_id" value="{{ $cls->id }}">
                                                                            <button type="submit" class="text-[10px] font-bold inline-flex items-center gap-1 transition {{ $isCustom ? 'text-rose-400 hover:text-rose-300' : 'text-slate-400 hover:text-sky-300' }}">
                                                                                @if($isCustom)
                                                                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                                    <span>Remove</span>
                                                                                @else
                                                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                                                                    <span>Add Custom</span>
                                                                                @endif
                                                                            </button>
                                                                        </form>
                                                                        <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $cls->teacher_initials]) }}" class="text-[10px] text-indigo-400 hover:underline">
                                                                            Faculty &rarr;
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <!-- Clean Free Slot indicator -->
                                                        <div class="h-24 rounded-xl border border-dashed border-slate-800/80 dark:border-slate-800/50 flex flex-col items-center justify-center text-center p-2 text-slate-600 dark:text-slate-700 select-none">
                                                            <span class="text-[11px] font-semibold text-slate-500">Free Slot</span>
                                                            <span class="text-[9px] text-slate-600 font-mono mt-0.5">No Class</span>
                                                        </div>
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    {{-- ========================================================== --}}
                    {{-- VIEW OPTION B: DAY-BY-DAY CARDS VIEW                       --}}
                    {{-- ========================================================== --}}
                    <div class="space-y-6">
                        @forelse($routines as $dayName => $slots)
                            <section class="overflow-hidden rounded-2xl border border-slate-800 bg-slate-900/90 dark:bg-[#0c142b] shadow-xl">
                                <div class="border-b border-slate-800 bg-slate-950/70 dark:bg-[#080e1e] px-5 py-3.5 flex items-center justify-between">
                                    <h3 class="text-base font-extrabold uppercase tracking-wider text-sky-400 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ $dayName }}
                                    </h3>
                                    <span class="text-xs font-bold text-slate-400 bg-slate-800/80 px-2.5 py-1 rounded-full border border-slate-700/60">
                                        {{ $slots->count() }} Classes
                                    </span>
                                </div>
                                <div class="p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach($slots as $slot)
                                        @php
                                            $fac = App\Services\FacultyService::getFaculty($slot->teacher_initials);
                                            $isCustom = in_array($slot->id, $customSlotIds);
                                        @endphp
                                        <article class="rounded-xl border border-slate-700/80 bg-slate-800/80 dark:bg-[#131f3d] p-4 hover:border-sky-400 transition-all duration-200">
                                            <div class="flex items-center justify-between text-xs font-mono font-bold text-sky-300 pb-2 border-b border-slate-700/60">
                                                <span>{{ date('h:i A', strtotime($slot->start_time)) }} — {{ date('h:i A', strtotime($slot->end_time)) }}</span>
                                                @if($slot->major_track)
                                                    <span class="px-2 py-0.5 rounded text-[10px] bg-amber-400/20 text-amber-300 border border-amber-400/30 uppercase font-sans font-extrabold">
                                                        {{ $slot->major_track }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="mt-3">
                                                <h4 class="text-xl font-black text-white tracking-tight">{{ $slot->course_id }}</h4>
                                                <div class="mt-2.5 space-y-1.5 text-xs text-slate-300">
                                                    <div class="flex items-center gap-2">
                                                        <span class="px-1.5 py-0.5 rounded bg-indigo-500/20 text-indigo-300 font-mono text-[11px] font-bold border border-indigo-500/30">
                                                            {{ $slot->teacher_initials }}
                                                        </span>
                                                        <span class="font-bold text-white">{{ $fac['name'] }}</span>
                                                    </div>
                                                    <p class="text-[11px] text-slate-400 pl-1">{{ $fac['designation'] }}</p>
                                                    <div class="flex items-center justify-between pt-2 border-t border-slate-700/40 text-slate-300">
                                                        <span class="font-bold text-emerald-400 flex items-center gap-1">
                                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                                            {{ $slot->classroom_no }}
                                                        </span>
                                                        <span class="text-xs font-mono text-slate-400">{{ $slot->building }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="no-print mt-3 pt-2.5 flex items-center justify-between border-t border-slate-700/60">
                                                <form method="POST" action="{{ route('custom.toggle') }}">
                                                    @csrf
                                                    <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                                                    <button type="submit" class="text-xs font-bold transition {{ $isCustom ? 'text-rose-400' : 'text-slate-400 hover:text-sky-300' }}">
                                                        {{ $isCustom ? '✓ Added to Custom Routine' : '+ Add to Custom' }}
                                                    </button>
                                                </form>
                                                <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $slot->teacher_initials]) }}" class="text-xs text-sky-400 hover:underline">
                                                    Faculty Schedule &rarr;
                                                </a>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </section>
                        @empty
                            <div class="rounded-2xl border border-dashed border-slate-700 bg-slate-900/60 p-12 text-center text-slate-400">
                                <p class="text-lg font-bold">No routine classes found for Batch {{ $batch }} - Section {{ $section }}.</p>
                                <p class="text-xs text-slate-500 mt-1">Try switching to another section or clearing major track filters.</p>
                            </div>
                        @endforelse
                    </div>
                @endif

                <!-- Print Footer Legend Table (Included when downloading PDF / Printing) -->
                <div class="print-only mt-8 pt-4 border-t-2 border-slate-900 text-xs">
                    <h4 class="font-black text-sm uppercase mb-2">Faculty Identification Key (Batch {{ $batch }}-{{ $section }})</h4>
                    <div class="grid grid-cols-2 gap-x-6 gap-y-1">
                        @php
                            $uniqueInitials = $routines->flatten(1)->pluck('teacher_initials')->unique()->sort();
                        @endphp
                        @foreach($uniqueInitials as $init)
                            @php $f = App\Services\FacultyService::getFaculty($init); @endphp
                            <div class="border-b border-slate-200 py-1 flex items-center justify-between">
                                <span class="font-black font-mono">[{{ $init }}]</span>
                                <span class="font-bold">{{ $f['name'] }}</span>
                                <span class="text-slate-600 text-[10px]">({{ $f['designation'] }})</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-8 flex items-center justify-between text-slate-600 text-[10px]">
                        <span>Verified by: Department Routine Committee, Dept of SWE, DIU</span>
                        <span>Official Academic Document • Daffodil International University</span>
                    </div>
                </div>
            </div>
        @endif

        {{-- ============================================================== --}}
        {{-- TAB 2: FACULTY DIRECTORY & SCHEDULES                          --}}
        {{-- ============================================================== --}}
        @if($activeTab === 'faculty')
            <div class="space-y-6">
                <!-- Faculty Search Card -->
                <div class="bg-slate-900/90 dark:bg-[#0d162d] border border-slate-800 rounded-2xl p-6 shadow-xl relative overflow-hidden backdrop-blur-sm">
                    <div class="max-w-3xl">
                        <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-indigo-500/10 text-indigo-400 text-xs font-bold mb-3 border border-indigo-500/20">
                            Faculty Identification & Schedule Ledger
                        </div>
                        <h2 class="text-xl sm:text-2xl font-black text-white">Department Faculty Schedules & Directory</h2>
                        <p class="text-slate-400 text-xs sm:text-sm mt-1">
                            Search any faculty member by their 2-4 letter initial (e.g., <strong class="text-sky-400">MRA, MAK, IM, AAA</strong>) or by full name to view their complete weekly routine.
                        </p>
                    </div>

                    <!-- Search Form -->
                    <form method="GET" action="{{ route('routine.index') }}" class="mt-6 flex flex-col sm:flex-row gap-3">
                        <input type="hidden" name="tab" value="faculty">
                        <div class="relative flex-1">
                            <input type="text" name="faculty_initials" value="{{ $facultyQuery }}" placeholder="Enter initials (e.g. MRA) or full name (e.g. Ashek / Abdul Kader)..." class="w-full bg-slate-800/90 dark:bg-[#131f3d] border border-slate-700/80 rounded-xl px-4 py-3 text-white font-semibold placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition text-sm">
                        </div>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold px-6 py-3 rounded-xl transition shadow-lg shadow-indigo-600/25 text-sm flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <span>Find Schedule</span>
                        </button>
                    </form>

                    <!-- Quick Click Faculty Chips -->
                    <div class="mt-5 pt-4 border-t border-slate-800">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400 mr-2">Popular Teachers:</span>
                        <div class="inline-flex flex-wrap gap-1.5 mt-2">
                            @foreach($popularFaculty->take(16) as $init)
                                @php $f = App\Services\FacultyService::getFaculty($init); @endphp
                                <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $init]) }}" class="px-2.5 py-1 rounded-lg text-xs font-bold transition border {{ $facultyQuery === $init ? 'bg-indigo-600 text-white border-indigo-500' : 'bg-slate-800/70 text-slate-300 hover:bg-slate-700 border-slate-700/60' }}" title="{{ $f['name'] }} ({{ $f['designation'] }})">
                                    {{ $init }} <span class="text-[10px] text-slate-400 font-normal hidden sm:inline">• {{ Str::limit($f['name'], 14) }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Searched Faculty Schedule Display -->
                @if(!empty($facultyQuery))
                    <div class="bg-slate-900/90 dark:bg-[#0c142b] border border-slate-800 rounded-2xl p-6 shadow-xl">
                        <!-- Faculty Header Profile Card -->
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-6 border-b border-slate-800">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-indigo-600 to-sky-400 flex items-center justify-center text-white font-black text-xl font-mono shadow-lg shadow-indigo-600/30">
                                    {{ $facultyQuery }}
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h3 class="text-xl sm:text-2xl font-black text-white">{{ $facultyInfo['name'] ?? $facultyQuery }}</h3>
                                    </div>
                                    <p class="text-sm font-semibold text-sky-400">{{ $facultyInfo['designation'] ?? 'Department Faculty' }}</p>
                                    <p class="text-xs text-slate-400 mt-0.5">Software Engineering Department • Daffodil International University</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-black text-white font-mono">{{ $facultyRoutines->flatten(1)->count() }}</div>
                                <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Weekly Classes</div>
                            </div>
                        </div>

                        <!-- Class Slots by Day -->
                        <div class="mt-6 space-y-6">
                            @forelse($facultyRoutines as $day => $classes)
                                <div class="rounded-xl border border-slate-800 overflow-hidden">
                                    <div class="bg-slate-950/70 px-4 py-2.5 flex items-center justify-between border-b border-slate-800">
                                        <span class="font-extrabold text-sky-300 text-sm uppercase tracking-wider">{{ $day }}</span>
                                        <span class="text-xs font-mono text-slate-400">{{ $classes->count() }} slots</span>
                                    </div>
                                    <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                        @foreach($classes as $c)
                                            <div class="p-3.5 rounded-xl border border-slate-700/80 bg-slate-800/80">
                                                <div class="flex items-center justify-between text-xs font-mono font-bold text-sky-300 mb-1.5">
                                                    <span>{{ date('h:i A', strtotime($c->start_time)) }} - {{ date('h:i A', strtotime($c->end_time)) }}</span>
                                                    <span class="px-2 py-0.5 rounded bg-sky-500/20 text-sky-300 font-sans text-[10px]">
                                                        Batch {{ $c->batch }}-{{ $c->section }}
                                                    </span>
                                                </div>
                                                <h5 class="text-base font-black text-white">{{ $c->course_id }}</h5>
                                                <div class="mt-2 text-xs flex items-center justify-between text-slate-300">
                                                    <span class="text-emerald-400 font-bold">Room: {{ $c->classroom_no }}</span>
                                                    <span class="text-slate-400 font-mono">{{ $c->building }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <div class="p-10 text-center text-slate-400">
                                    No scheduled routine classes found for initial <strong>{{ $facultyQuery }}</strong>.
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endif

                <!-- Complete Faculty Directory Table from Fall 2026 Document -->
                <div class="bg-slate-900/90 dark:bg-[#0c142b] border border-slate-800 rounded-2xl p-6 shadow-xl">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6">
                        <div>
                            <h3 class="text-lg font-black text-white">Full Faculty Directory ({{ count($facultyDirectory) }} Members)</h3>
                            <p class="text-xs text-slate-400">Official names and designations matching the Fall 2026 Academic Routine document.</p>
                        </div>
                        <input type="text" id="facultyFilterInput" onkeyup="filterFacultyTable()" placeholder="Quick filter table..." class="bg-slate-800 border border-slate-700 rounded-xl px-3.5 py-1.5 text-xs text-white placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-sky-500 w-full sm:w-64">
                    </div>

                    <div class="overflow-x-auto">
                        <table id="facultyTable" class="w-full text-left text-xs sm:text-sm divide-y divide-slate-800">
                            <thead>
                                <tr class="text-slate-400 font-bold text-xs uppercase tracking-wider">
                                    <th class="py-3 px-3">Initial</th>
                                    <th class="py-3 px-4">Faculty Member Full Name</th>
                                    <th class="py-3 px-4">Academic Designation</th>
                                    <th class="py-3 px-3 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800/60 font-medium">
                                @foreach($facultyDirectory as $init => $f)
                                    <tr class="hover:bg-slate-800/40 transition">
                                        <td class="py-3 px-3 font-mono font-bold text-sky-400">
                                            <span class="px-2 py-1 rounded bg-slate-800 border border-slate-700/80">{{ $init }}</span>
                                        </td>
                                        <td class="py-3 px-4 text-white font-bold">{{ $f['name'] }}</td>
                                        <td class="py-3 px-4 text-slate-400">{{ $f['designation'] }}</td>
                                        <td class="py-3 px-3 text-right">
                                            <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $init]) }}" class="inline-flex items-center gap-1 text-xs font-bold text-indigo-400 hover:text-indigo-300">
                                                <span>View Routine</span> &rarr;
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        {{-- ============================================================== --}}
        {{-- TAB 3: EMPTY SWE ROOM TRACKER                                  --}}
        {{-- ============================================================== --}}
        @if($activeTab === 'empty_rooms')
            <div class="space-y-6">
                <!-- Filter Bar -->
                <div class="bg-slate-900/90 dark:bg-[#0d162d] border border-slate-800 rounded-2xl p-6 shadow-xl backdrop-blur-sm">
                    <div class="max-w-3xl">
                        <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-emerald-500/10 text-emerald-400 text-xs font-bold mb-3 border border-emerald-500/20">
                            Physical Spaces & Lab Availability Engine
                        </div>
                        <h2 class="text-xl sm:text-2xl font-black text-white">SWE Dedicated Free Room Tracker</h2>
                        <p class="text-slate-400 text-xs sm:text-sm mt-1">
                            Tracks the 18 dedicated Software Engineering Department rooms and laboratories in real time. Perfect for group projects, self-study, and lab sessions.
                        </p>
                    </div>

                    <form method="GET" action="{{ route('routine.index') }}" class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
                        <input type="hidden" name="tab" value="empty_rooms">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Academic Day</label>
                            <select name="empty_day" onchange="this.form.submit()" class="w-full bg-slate-800/90 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-emerald-500 transition text-sm">
                                @foreach($days as $d)
                                    <option value="{{ $d }}" {{ $emptyDay === $d ? 'selected' : '' }}>{{ $d }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Class Interval</label>
                            <select name="empty_slot" onchange="this.form.submit()" class="w-full bg-slate-800/90 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-emerald-500 transition text-sm">
                                @foreach($timeSlots as $slot)
                                    @php $val = $slot['start'].' - '.$slot['end']; @endphp
                                    <option value="{{ $val }}" {{ $emptySlot === $val ? 'selected' : '' }}>
                                        {{ $slot['label'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black px-4 py-2.5 rounded-xl transition shadow-lg shadow-emerald-500/20 text-sm flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <span>Inspect Spaces</span>
                        </button>
                    </form>
                </div>

                <!-- Stats Counters -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div class="p-5 rounded-2xl bg-slate-900/80 border border-slate-800">
                        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Rooms</div>
                        <div class="text-2xl sm:text-3xl font-black text-white font-mono mt-1">{{ count($dedicatedRooms) }}</div>
                    </div>
                    <div class="p-5 rounded-2xl bg-emerald-950/40 border border-emerald-800/50">
                        <div class="text-xs font-bold text-emerald-400 uppercase tracking-wider">Available Free</div>
                        <div class="text-2xl sm:text-3xl font-black text-emerald-300 font-mono mt-1">{{ $roomAnalysis['available_count'] }}</div>
                    </div>
                    <div class="p-5 rounded-2xl bg-rose-950/40 border border-rose-800/50">
                        <div class="text-xs font-bold text-rose-400 uppercase tracking-wider">Occupied Rooms</div>
                        <div class="text-2xl sm:text-3xl font-black text-rose-300 font-mono mt-1">{{ $roomAnalysis['occupied_count'] }}</div>
                    </div>
                    <div class="p-5 rounded-2xl bg-slate-900/80 border border-slate-800">
                        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Availability</div>
                        <div class="text-2xl sm:text-3xl font-black text-sky-400 font-mono mt-1">
                            {{ round(($roomAnalysis['available_count'] / count($dedicatedRooms)) * 100) }}%
                        </div>
                    </div>
                </div>

                <!-- Room Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($roomAnalysis['rooms'] as $rm)
                        @php $isFree = ($rm['status'] === 'Available / Empty'); @endphp
                        <div class="rounded-2xl border p-5 transition-all {{ $isFree ? 'bg-slate-900/80 border-emerald-500/40 hover:border-emerald-400' : 'bg-slate-900/50 border-rose-500/30' }}">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="text-xl font-black text-white font-mono">{{ $rm['room_no'] }}</h4>
                                <span class="px-2.5 py-1 rounded-full text-xs font-extrabold {{ $isFree ? 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/40' : 'bg-rose-500/20 text-rose-300 border border-rose-500/40' }}">
                                    {{ $isFree ? 'Available' : 'Occupied' }}
                                </span>
                            </div>
                            <div class="text-xs text-slate-400">
                                <span>Building: <strong class="text-slate-200">{{ $rm['building'] }}</strong></span>
                            </div>
                            @if(!$isFree && isset($rm['occupied_by']))
                                <div class="mt-3 pt-3 border-t border-slate-800 text-xs space-y-1">
                                    <div class="text-slate-300 font-bold">Class: {{ $rm['occupied_by']['course_id'] }}</div>
                                    <div class="text-slate-400">
                                        Faculty: <strong class="text-slate-200">{{ $rm['occupied_by']['teacher_name'] }} ({{ $rm['occupied_by']['teacher_initials'] }})</strong>
                                    </div>
                                    <div class="text-slate-500 text-[11px]">Batch {{ $rm['occupied_by']['batch'] }} • Sec {{ $rm['occupied_by']['section'] }}</div>
                                </div>
                            @else
                                <div class="mt-3 pt-3 border-t border-slate-800/80 text-[11px] text-emerald-400 font-medium">
                                    ✓ Free for student study group & practice
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- ============================================================== --}}
        {{-- TAB 4: CUSTOM ROUTINE BUILDER (FOR IRREGULAR STUDENTS)         --}}
        {{-- ============================================================== --}}
        @if($activeTab === 'custom')
            <div class="space-y-6">
                <!-- Header Info -->
                <div class="bg-slate-900/90 dark:bg-[#0d162d] border border-slate-800 rounded-2xl p-6 shadow-xl backdrop-blur-sm">
                    <div class="max-w-3xl">
                        <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-violet-500/10 text-violet-400 text-xs font-bold mb-3 border border-violet-500/20">
                            Cross-Batch & Retake Course Organizer
                        </div>
                        <h2 class="text-xl sm:text-2xl font-black text-white">Customizable Routine Builder</h2>
                        <p class="text-slate-400 text-xs sm:text-sm mt-1">
                            Lookup courses across all batches, select your registered sections, and compile an individualized weekly timetable with zero time clashes.
                        </p>
                    </div>

                    <!-- Search Course Input -->
                    <form method="GET" action="{{ route('routine.index') }}" class="mt-6 flex flex-col sm:flex-row gap-3">
                        <input type="hidden" name="tab" value="custom">
                        <div class="relative flex-1">
                            <input type="text" name="course_search" value="{{ $courseSearch }}" placeholder="Enter Course Code (e.g. SWE112, SE223, MAT101)..." class="w-full bg-slate-800/90 border border-slate-700/80 rounded-xl px-4 py-3 text-white font-semibold uppercase placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-violet-500 transition text-sm">
                        </div>
                        <button type="submit" class="bg-violet-600 hover:bg-violet-500 text-white font-bold px-6 py-3 rounded-xl transition shadow-lg shadow-violet-600/25 text-sm flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <span>Search Slots</span>
                        </button>
                    </form>
                </div>

                <!-- Custom Timetable Result Summary -->
                <div class="bg-slate-900/90 dark:bg-[#0c142b] border border-slate-800 rounded-2xl p-6 shadow-xl">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-5 border-b border-slate-800">
                        <div>
                            <h3 class="text-lg font-black text-white">Your Selected Custom Routine</h3>
                            <p class="text-xs text-slate-400">Total Selected Slots: <strong class="text-sky-400">{{ count($customSlotIds) }}</strong> classes.</p>
                        </div>
                        @if(count($customSlotIds) > 0)
                            <div class="flex items-center gap-2">
                                <button onclick="window.print()" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs font-bold text-white border border-slate-700 transition">
                                    Print Custom
                                </button>
                                <form method="POST" action="{{ route('custom.clear') }}">
                                    @csrf
                                    <button type="submit" class="px-3.5 py-2 rounded-xl bg-rose-600/80 hover:bg-rose-500 text-xs font-bold text-white transition">
                                        Reset Custom Routine
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>

                    @if(count($customSlotIds) > 0)
                        <!-- Custom Weekly Grid -->
                        <div class="mt-6 overflow-x-auto rounded-xl border border-slate-800">
                            <table class="w-full text-left text-xs sm:text-sm print-table">
                                <thead>
                                    <tr class="bg-slate-950/80 text-slate-300 border-b border-slate-800">
                                        <th class="p-3 font-bold border-r border-slate-800 w-28">Day</th>
                                        @foreach($timeSlots as $slot)
                                            <th class="p-3 text-center border-r border-slate-800 last:border-r-0 min-w-[150px]">
                                                {{ $slot['label'] }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-800">
                                    @foreach(['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'] as $d)
                                        <tr>
                                            <td class="p-3 font-bold text-sky-400 bg-slate-900 border-r border-slate-800 align-top">{{ $d }}</td>
                                            @foreach($timeSlots as $slot)
                                                @php $classes = $customWeeklyGrid[$d][$slot['label']] ?? []; @endphp
                                                <td class="p-2 border-r border-slate-800 last:border-r-0 align-top">
                                                    @foreach($classes as $c)
                                                        @php $fac = App\Services\FacultyService::getFaculty($c->teacher_initials); @endphp
                                                        <div class="p-2.5 rounded-lg bg-slate-800/90 border border-slate-700 mb-1.5 shadow">
                                                            <div class="font-black text-sky-300 text-xs">{{ $c->course_id }} (Sec {{ $c->section }})</div>
                                                            <div class="text-[11px] font-bold text-white mt-1">{{ $fac['name'] }} ({{ $c->teacher_initials }})</div>
                                                            <div class="text-[10px] text-emerald-400 mt-0.5">Room {{ $c->classroom_no }}</div>
                                                        </div>
                                                    @endforeach
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="p-10 text-center text-slate-500">
                            No custom slots selected yet. Search a course above to add slots to your custom schedule!
                        </div>
                    @endif
                </div>

                <!-- Course Search Available Slots Table -->
                @if(!empty($courseSearch))
                    <div class="bg-slate-900/90 dark:bg-[#0c142b] border border-slate-800 rounded-2xl p-6 shadow-xl">
                        <h4 class="text-base font-black text-white mb-4">
                            Available Class Slots for <span class="text-violet-400">"{{ $courseSearch }}"</span>
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($courseSearchResults->flatten(1) as $slot)
                                @php
                                    $isSel = in_array($slot->id, $customSlotIds);
                                    $fac = App\Services\FacultyService::getFaculty($slot->teacher_initials);
                                @endphp
                                <div class="rounded-xl border p-4 {{ $isSel ? 'bg-violet-950/30 border-violet-500/50' : 'bg-slate-800/80 border-slate-700/80' }}">
                                    <div class="flex items-center justify-between text-xs font-mono font-bold text-sky-300">
                                        <span>Batch {{ $slot->batch }} • Sec {{ $slot->section }}</span>
                                        <span>{{ $slot->day_of_week }}</span>
                                    </div>
                                    <h5 class="text-lg font-black text-white mt-1.5">{{ $slot->course_id }}</h5>
                                    <p class="text-xs text-slate-300 mt-1">Faculty: <strong class="text-white">{{ $fac['name'] }} ({{ $slot->teacher_initials }})</strong></p>
                                    <p class="text-xs text-slate-400">Time: {{ date('h:i A', strtotime($slot->start_time)) }} - {{ date('h:i A', strtotime($slot->end_time)) }}</p>
                                    <p class="text-xs text-emerald-400">Room: {{ $slot->classroom_no }} ({{ $slot->building }})</p>
                                    
                                    <form method="POST" action="{{ route('custom.toggle') }}" class="mt-3 pt-2.5 border-t border-slate-700/60">
                                        @csrf
                                        <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                                        <button type="submit" class="w-full py-1.5 rounded-lg text-xs font-bold transition {{ $isSel ? 'bg-rose-600 text-white' : 'bg-violet-600 hover:bg-violet-500 text-white' }}">
                                            {{ $isSel ? 'Remove from Custom Routine' : '+ Select this Slot' }}
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        @endif

        {{-- ============================================================== --}}
        {{-- TAB 5: COURSE OFFERINGS SYLLABUS DIRECTORY                     --}}
        {{-- ============================================================== --}}
        @if($activeTab === 'offerings')
            <div class="space-y-6">
                <div class="bg-slate-900/90 dark:bg-[#0d162d] border border-slate-800 rounded-2xl p-6 shadow-xl backdrop-blur-sm">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div>
                            <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-sky-500/10 text-sky-400 text-xs font-bold mb-3 border border-sky-500/20">
                                Department Academic Curriculum
                            </div>
                            <h2 class="text-xl sm:text-2xl font-black text-white">Course Offerings & Syllabus Matrix</h2>
                            <p class="text-slate-400 text-xs sm:text-sm mt-1">Official course syllabus load and credit breakdown for each engineering cohort.</p>
                        </div>
                        <form method="GET" action="{{ route('routine.index') }}" class="flex items-center gap-2">
                            <input type="hidden" name="tab" value="offerings">
                            <select name="offering_batch" onchange="this.form.submit()" class="bg-slate-800 border border-slate-700 rounded-xl px-3.5 py-2 text-white font-semibold text-xs sm:text-sm">
                                <option value="0">All Batches</option>
                                @foreach($availableBatches as $b)
                                    <option value="{{ $b }}" {{ $offeringBatch == $b ? 'selected' : '' }}>Batch {{ $b }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse($offerings as $course)
                            <div class="rounded-xl border border-slate-800 bg-slate-800/60 p-4 hover:border-slate-700 transition">
                                <div class="flex items-center justify-between text-xs mb-2">
                                    <span class="px-2 py-0.5 rounded font-mono font-bold bg-sky-500/20 text-sky-300 border border-sky-500/30">
                                        Batch {{ $course->batch }}
                                    </span>
                                    <span class="font-bold text-slate-400">{{ $course->credits }} Credits</span>
                                </div>
                                <h4 class="text-base font-black text-white">{{ $course->course_code }}</h4>
                                <p class="text-xs text-slate-300 font-medium mt-1">{{ $course->course_name }}</p>
                                @if($course->major_track)
                                    <span class="mt-2 inline-block text-[10px] font-extrabold px-2 py-0.5 rounded bg-amber-400/20 text-amber-300 uppercase">
                                        Track: {{ $course->major_track }}
                                    </span>
                                @endif
                            </div>
                        @empty
                            <div class="p-8 text-center text-slate-500 col-span-3">No course offerings found.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif

    </main>

    <!-- Unified Realistic Footer -->
    <footer class="no-print mt-auto border-t border-slate-800 bg-slate-950/80 dark:bg-[#070d18] text-slate-400 py-8 px-4 sm:px-6 lg:px-8 text-xs">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="Logo" class="w-10 h-10 object-contain">
                <div>
                    <p class="font-extrabold text-sm text-white">Daffodil International University</p>
                    <p class="text-slate-400">Department of Software Engineering (Dept of SWE)</p>
                </div>
            </div>
            <div class="text-center md:text-right space-y-1">
                <p class="text-slate-300 font-semibold">Fall 2026 Academic Session • Class Routine Engine</p>
                <p class="text-slate-500">Daffodil Smart City (DSC), Birulia, Savar, Dhaka-1216, Bangladesh</p>
                <p class="text-slate-600 text-[10px]">Powered by Laravel 13 Framework & Local MySQL Database</p>
            </div>
        </div>
    </footer>

    <!-- Client-side Interactive Scripts -->
    <script>
        // Live Clock Ticker
        function updateClock() {
            const now = new Date();
            const options = { weekday: 'short', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
            const clockEl = document.getElementById('liveClock');
            if (clockEl) {
                clockEl.textContent = now.toLocaleDateString('en-US', options);
            }
        }
        setInterval(updateClock, 1000);
        updateClock();

        // Theme Toggle (Dark / Light)
        function toggleTheme() {
            const html = document.documentElement;
            const sunIcon = document.getElementById('themeIconSun');
            const moonIcon = document.getElementById('themeIconMoon');

            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('diu_theme', 'light');
                if (sunIcon) sunIcon.classList.add('hidden');
                if (moonIcon) moonIcon.classList.remove('hidden');
            } else {
                html.classList.add('dark');
                localStorage.setItem('diu_theme', 'dark');
                if (sunIcon) sunIcon.classList.remove('hidden');
                if (moonIcon) moonIcon.classList.add('hidden');
            }
        }

        // Initialize Theme Toggle Icon on Load
        document.addEventListener('DOMContentLoaded', () => {
            const html = document.documentElement;
            const sunIcon = document.getElementById('themeIconSun');
            const moonIcon = document.getElementById('themeIconMoon');
            if (!html.classList.contains('dark')) {
                if (sunIcon) sunIcon.classList.add('hidden');
                if (moonIcon) moonIcon.classList.remove('hidden');
            }
        });

        // Faculty Directory Table Filter
        function filterFacultyTable() {
            const input = document.getElementById('facultyFilterInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('facultyTable');
            if (!table) return;
            const tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                const text = tr[i].textContent || tr[i].innerText;
                if (text.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = '';
                } else {
                    tr[i].style.display = 'none';
                }
            }
        }
    </script>
</body>
</html>
