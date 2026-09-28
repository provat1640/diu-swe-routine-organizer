<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daffodil International University • Dept of SWE • Weekly Routine Organizer</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="alternate icon" href="{{ asset('favicon.ico') }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        menu: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                            950: '#082f49',
                        },
                        navy: {
                            50: '#f0f5fa',
                            100: '#e2ecf5',
                            150: '#d5e3f0',
                            200: '#cbdde9',
                            300: '#a3c2dc',
                            400: '#6c96bd',
                            500: '#3b6f9e',
                            600: '#2b5680',
                            700: '#1e3f61',
                            800: '#142d47',
                            900: '#0f2b5c',
                            950: '#091a38',
                            card: '#ffffff',
                            cardHover: '#f8fafc',
                            border: '#cbdde9',
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

    <!-- html2canvas for High-Definition Routine Image Export -->
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 7px; height: 7px; }
        ::-webkit-scrollbar-track { background: #e2ecf5; }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #64748b; }

        /* Strictly One Landscape Page Layout & Print Optimization */
        @page {
            size: A4 landscape;
            margin: 4mm 5mm;
        }

        @media print {
            .no-print { display: none !important; }
            html, body {
                background: white !important;
                color: #0f172a !important;
                font-size: 7pt !important;
                margin: 0 !important;
                padding: 0 !important;
                height: 100vh !important;
                max-height: 100vh !important;
                overflow: hidden !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            .print-only { display: block !important; }
            .print-container {
                display: flex !important;
                flex-direction: column !important;
                height: 98vh !important;
                max-height: 98vh !important;
                box-sizing: border-box !important;
                page-break-inside: avoid !important;
                break-inside: avoid !important;
                overflow: hidden !important;
            }
            .print-card {
                border: 1px solid #cbd5e1 !important;
                background: #f8fafc !important;
                color: #0f172a !important;
                box-shadow: none !important;
                page-break-inside: avoid !important;
                break-inside: avoid !important;
                padding: 2px 3px !important;
                margin-bottom: 2px !important;
            }
            .print-table {
                width: 100% !important;
                border-collapse: collapse !important;
                table-layout: fixed !important;
                font-size: 6.5pt !important;
            }
            .print-table th, .print-table td {
                border: 1px solid #94a3b8 !important;
                padding: 2.5px 3px !important;
                color: #0f172a !important;
                vertical-align: top !important;
                word-wrap: break-word !important;
                page-break-inside: avoid !important;
                break-inside: avoid !important;
            }
            .print-table th {
                background: #0f2b5c !important;
                color: #ffffff !important;
                font-weight: 800 !important;
                font-size: 7pt !important;
                text-align: center !important;
            }
        }

        .print-only { display: none; }
    </style>
</head>
<body class="bg-[#edf3f8] text-[#1e293b] min-h-screen antialiased flex flex-col selection:bg-sky-500 selection:text-white">

    <!-- Top Status / Feedback Notification Bar -->
    @if(session('status'))
        <div class="no-print bg-emerald-600 text-white text-xs sm:text-sm font-semibold px-4 py-2 text-center shadow-md flex items-center justify-center gap-2">
            <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    <!-- PRINT-ONLY OFFICIAL COMPACT HEADER (Strictly 1 Landscape Sheet) -->
    <div class="print-only px-3 py-1.5 border-b border-slate-900 mb-1 bg-white">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="DIU SWE Logo" class="w-9 h-9 object-contain shrink-0">
                <div>
                    <h1 class="text-xs font-black uppercase tracking-tight text-slate-950">Daffodil International University</h1>
                    <h2 class="text-[10px] font-bold text-slate-800">Department of Software Engineering (Dept of SWE) • Fall 2026 Academic Routine</h2>
                </div>
            </div>
            <div class="text-right text-[8.5px] leading-tight">
                <div class="font-extrabold text-[10px] text-slate-900">Batch {{ $batch }} • Section {{ $section }} @if($track)({{ $track }})@endif</div>
                <div class="text-slate-600">Effective: Sept 19, 2026 • Exported: {{ date('d M Y, h:i A') }}</div>
            </div>
        </div>
    </div>

    <!-- MAIN TWO-COLUMN DASHBOARD LAYOUT -->
    <div class="flex-1 flex flex-col md:flex-row min-h-screen">

        {{-- ============================================================== --}}
        {{-- LEFT CORNER MENU / SIDEBAR (LIGHT BLUE THEME)                 --}}
        {{-- ============================================================== --}}
        <aside class="no-print w-full md:w-64 lg:w-72 bg-[#e0f2fe] border-r border-[#bae6fd] shadow-lg flex flex-col shrink-0 text-[#0c4a6e] relative z-30">
            
            <!-- Sidebar Header: DIU Logo & University Branding (Clean, No Cutout) -->
            <div class="p-5 pb-4 border-b border-[#bae6fd] bg-gradient-to-b from-[#e0f2fe] to-[#d6effd]">
                <a href="{{ route('routine.index') }}" class="flex items-center gap-3 group focus:outline-none">
                    <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="DIU SWE Logo" class="w-12 h-12 object-contain shrink-0 drop-shadow-sm group-hover:scale-105 transition-transform duration-300">
                    <div>
                        <h1 class="text-base lg:text-lg font-black tracking-tight text-[#0f2b5c] leading-tight group-hover:text-blue-700 transition">
                            Daffodil International University
                        </h1>
                        <h2 class="text-xs font-bold text-[#0284c7] tracking-wide flex items-center gap-1 mt-0.5">
                            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                            Dept of SWE
                        </h2>
                    </div>
                </a>
            </div>

            <!-- Mobile Menu Toggle Button (Visible on Small Screens) -->
            <div class="md:hidden px-4 py-2.5 bg-[#d7edfe] border-b border-[#bae6fd] flex items-center justify-between">
                <span class="text-xs font-black uppercase tracking-wider text-[#0369a1]">Navigation Menu</span>
                <button type="button" onclick="toggleMobileMenu()" class="p-2 rounded-lg bg-sky-200 text-[#0c4a6e] hover:bg-sky-300 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>

            <!-- Vertical Menu Navigation Stack -->
            <nav id="sidebarNav" class="flex-1 p-4 space-y-1.5 overflow-y-auto hidden md:block">
                
                <div class="px-3 py-1 text-[11px] font-extrabold uppercase tracking-wider text-[#0284c7]">
                    Routine Command Center
                </div>

                <!-- 1. Weekly Routine Matrix -->
                <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => $viewMode]) }}" class="flex items-center justify-between px-3.5 py-3 rounded-xl text-xs sm:text-sm font-bold transition-all duration-150 {{ $activeTab === 'routine' ? 'bg-[#0f2b5c] text-white shadow-md shadow-[#0f2b5c]/25' : 'text-[#1e3a5f] hover:bg-[#cbe7fd] hover:text-[#0c4a6e]' }}">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $activeTab === 'routine' ? 'text-sky-300' : 'text-[#0284c7]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Weekly Routine Matrix</span>
                    </div>
                    @if($activeTab === 'routine')
                        <span class="w-2 h-2 rounded-full bg-sky-300"></span>
                    @endif
                </a>

                <!-- 2. Faculty Directory & Schedules -->
                <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $facultyQuery ?? 'MRA']) }}" class="flex items-center justify-between px-3.5 py-3 rounded-xl text-xs sm:text-sm font-bold transition-all duration-150 {{ $activeTab === 'faculty' ? 'bg-[#0f2b5c] text-white shadow-md shadow-[#0f2b5c]/25' : 'text-[#1e3a5f] hover:bg-[#cbe7fd] hover:text-[#0c4a6e]' }}">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $activeTab === 'faculty' ? 'text-sky-300' : 'text-[#0284c7]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span>Faculty Directory</span>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-extrabold {{ $activeTab === 'faculty' ? 'bg-sky-400 text-slate-950' : 'bg-sky-200 text-[#075985]' }}">
                        {{ count($facultyDirectory) }}
                    </span>
                </a>

                <!-- 3. Empty Room Tracker -->
                <a href="{{ route('routine.index', ['tab' => 'empty_rooms', 'empty_day' => $emptyDay, 'empty_slot' => $emptySlot]) }}" class="flex items-center justify-between px-3.5 py-3 rounded-xl text-xs sm:text-sm font-bold transition-all duration-150 {{ $activeTab === 'empty_rooms' ? 'bg-[#0f2b5c] text-white shadow-md shadow-[#0f2b5c]/25' : 'text-[#1e3a5f] hover:bg-[#cbe7fd] hover:text-[#0c4a6e]' }}">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $activeTab === 'empty_rooms' ? 'text-emerald-300' : 'text-emerald-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span>Empty Room Tracker</span>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-extrabold bg-emerald-500/20 text-emerald-800 border border-emerald-300">
                        {{ $roomAnalysis['available_count'] }} Free
                    </span>
                </a>

                <!-- 4. Custom Routine Builder -->
                <a href="{{ route('routine.index', ['tab' => 'custom']) }}" class="flex items-center justify-between px-3.5 py-3 rounded-xl text-xs sm:text-sm font-bold transition-all duration-150 {{ $activeTab === 'custom' ? 'bg-[#0f2b5c] text-white shadow-md shadow-[#0f2b5c]/25' : 'text-[#1e3a5f] hover:bg-[#cbe7fd] hover:text-[#0c4a6e]' }}">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $activeTab === 'custom' ? 'text-violet-300' : 'text-violet-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        <span>Custom Routine</span>
                    </div>
                    @if(count($customSlotIds) > 0)
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-extrabold bg-sky-500 text-white">
                            {{ count($customSlotIds) }}
                        </span>
                    @endif
                </a>

                <!-- 5. Course Offerings -->
                <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => $offeringBatch ?? 41]) }}" class="flex items-center justify-between px-3.5 py-3 rounded-xl text-xs sm:text-sm font-bold transition-all duration-150 {{ $activeTab === 'offerings' ? 'bg-[#0f2b5c] text-white shadow-md shadow-[#0f2b5c]/25' : 'text-[#1e3a5f] hover:bg-[#cbe7fd] hover:text-[#0c4a6e]' }}">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $activeTab === 'offerings' ? 'text-sky-300' : 'text-[#0284c7]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <span>Course Offer Directory</span>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-extrabold bg-sky-200 text-[#075985]">
                        {{ $offerings->count() }}
                    </span>
                </a>

                <!-- Download Routine Shortcut Section in Sidebar -->
                <div class="pt-5 mt-4 border-t border-[#bae6fd]">
                    <div class="px-3 py-1 text-[11px] font-extrabold uppercase tracking-wider text-[#0284c7]">
                        Export Weekly Routine
                    </div>
                    <div class="space-y-1.5 mt-1">
                        <button type="button" onclick="exportRoutineImage('weeklyRoutineContainer', 'DIU_SWE_Batch_{{ $batch }}_{{ $section }}_Weekly_Routine_A4_Landscape')" class="w-full flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-bold text-[#0f2b5c] bg-white/70 hover:bg-white border border-[#bae6fd] hover:text-[#0c4a6e] transition shadow-xs">
                            <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>Download Routine Image (PNG)</span>
                        </button>
                        <a href="{{ route('routine.export.csv', ['batch' => $batch, 'section' => $section, 'major_track' => $track]) }}" class="w-full flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-bold text-[#065f46] bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 transition shadow-xs">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span>Export Routine Data (CSV)</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Sidebar Footer: Session Info -->
            <div class="p-4 border-t border-[#bae6fd] bg-[#d7edfe] text-[11px] text-[#075985] mt-auto">
                <div class="font-extrabold text-[#0f2b5c] flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Fall 2026 Academic Session
                </div>
                <div class="text-[10px] text-[#0369a1] mt-0.5">Effective: September 19, 2026</div>
                <div class="text-[10px] text-[#075985] mt-1 font-mono">Batch {{ $batch }} • Section {{ $section }}</div>
            </div>
        </aside>

        {{-- ============================================================== --}}
        {{-- REST OF THE INTERFACE (LIGHT NAVY BLUE THEME)                 --}}
        {{-- ============================================================== --}}
        <div class="flex-1 flex flex-col min-w-0 bg-[#edf3f8] text-[#1e293b]">

            <!-- Top Campus & Quick Action Header (Light Navy Bar) -->
            <header class="no-print bg-[#e2ecf5] border-b border-[#cbdde9] text-xs text-[#0f2b5c] py-2.5 px-4 sm:px-6 lg:px-8 shadow-xs">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center gap-1.5 font-bold text-[#0f2b5c]">
                            <svg class="w-3.5 h-3.5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Daffodil Smart City (DSC), Ashulia, Dhaka
                        </span>
                        <span class="hidden md:inline text-slate-400">|</span>
                        <span class="hidden md:inline text-slate-600 font-medium">Faculty of Science & Information Technology (FSIT)</span>
                    </div>

                    <div class="flex items-center gap-4 text-xs font-semibold">
                        <span class="hidden sm:inline-flex items-center gap-1.5 text-emerald-800 bg-emerald-100 border border-emerald-300 px-2.5 py-0.5 rounded-full">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            Live Academic Routine
                        </span>
                        <span id="liveClock" class="font-mono text-[#0f2b5c] font-bold"></span>
                    </div>
                </div>
            </header>

            <!-- Main Content Canvas -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-6">

                {{-- ============================================================== --}}
                {{-- TAB 1: WEEKLY ROUTINE MATRIX (DEFAULT)                         --}}
                {{-- ============================================================== --}}
                @if($activeTab === 'routine')
                    <div class="space-y-6">

                        <!-- Filter & View Switch Toolbar Card (Light Navy Blue Style) -->
                        <div class="no-print bg-white border border-[#cbdde9] rounded-2xl p-5 sm:p-6 shadow-sm relative overflow-hidden">
                            <div class="absolute -right-20 -top-20 w-72 h-72 bg-sky-200/40 rounded-full blur-3xl pointer-events-none"></div>
                            
                            <form method="GET" action="{{ route('routine.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end relative z-10">
                                <input type="hidden" name="tab" value="routine">
                                <input type="hidden" name="view_mode" value="{{ $viewMode }}">

                                <!-- Batch Selector -->
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-[#0f2b5c] mb-2 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                        Target Batch
                                    </label>
                                    <select name="batch" onchange="this.form.submit()" class="w-full bg-[#f8fafc] border border-[#cbdde9] rounded-xl px-3.5 py-2.5 text-[#0f2b5c] font-semibold focus:outline-none focus:ring-2 focus:ring-sky-500 transition text-sm">
                                        @foreach($availableBatches as $b)
                                            <option value="{{ $b }}" {{ $batch == $b ? 'selected' : '' }}>
                                                Batch {{ $b }} @if($b == 41) (Major Tracks) @elseif($b == 40) (Graduating Seniors) @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Section Selector -->
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-[#0f2b5c] mb-2 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                                        Section
                                    </label>
                                    @php
                                        $maxSection = $batch === 40 ? 'F' : ($batch === 41 ? 'L' : (in_array($batch, [43, 44, 45]) ? 'N' : 'M'));
                                        $sectionsList = range('A', $maxSection);
                                    @endphp
                                    <select name="section" onchange="this.form.submit()" class="w-full bg-[#f8fafc] border border-[#cbdde9] rounded-xl px-3.5 py-2.5 text-[#0f2b5c] font-semibold focus:outline-none focus:ring-2 focus:ring-sky-500 transition text-sm">
                                        @foreach($sectionsList as $sec)
                                            <option value="{{ $sec }}" {{ $section === $sec ? 'selected' : '' }}>
                                                Section {{ $sec }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Track Selector (Batch 41 specific) -->
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-[#0f2b5c] mb-2 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                        Specialization Track
                                    </label>
                                    <select name="major_track" onchange="this.form.submit()" class="w-full bg-[#f8fafc] border border-[#cbdde9] rounded-xl px-3.5 py-2.5 text-[#0f2b5c] font-semibold focus:outline-none focus:ring-2 focus:ring-sky-500 transition text-sm {{ $batch !== 41 ? 'opacity-50' : '' }}">
                                        <option value="">All / Core Syllabus</option>
                                        <option value="SE" {{ $track === 'SE' ? 'selected' : '' }}>SE • Software Engineering</option>
                                        <option value="DS" {{ $track === 'DS' ? 'selected' : '' }}>DS • Data Science</option>
                                        <option value="RE" {{ $track === 'RE' ? 'selected' : '' }}>RE • Robotics & Embedded</option>
                                        <option value="ST" {{ $track === 'ST' ? 'selected' : '' }}>ST • Software Testing</option>
                                        <option value="CS" {{ $track === 'CS' ? 'selected' : '' }}>CS • Cyber Security</option>
                                    </select>
                                </div>

                                <!-- Load Routine & View Switcher -->
                                <div class="flex items-center gap-2">
                                    <button type="submit" class="flex-1 bg-[#0f2b5c] hover:bg-[#1e3a8a] text-white font-black px-4 py-2.5 rounded-xl transition shadow-md shadow-sky-900/15 text-sm flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                        <span>Load Routine</span>
                                    </button>
                                    <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => $viewMode === 'grid' ? 'cards' : 'grid']) }}" title="Switch between Weekly Matrix Grid and Day Cards" class="p-2.5 rounded-xl bg-[#f0f5fa] hover:bg-[#e2ecf5] text-[#0f2b5c] border border-[#cbdde9] transition">
                                        @if($viewMode === 'grid')
                                            <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" title="Switch to Cards View"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                        @else
                                            <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" title="Switch to Weekly Timetable Grid"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        @endif
                                    </a>
                                </div>
                            </form>
                        </div>

                        <!-- Active Routine Metadata & Export Bar -->
                        <div class="flex flex-wrap items-center justify-between gap-4 bg-white border border-[#cbdde9] rounded-2xl px-5 py-3.5 shadow-sm">
                            <div class="flex flex-wrap items-center gap-2 sm:gap-3 text-xs sm:text-sm">
                                <span class="font-black text-[#0f2b5c] text-base">Batch {{ $batch }}-{{ $section }}</span>
                                @if($track)
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-200">Track: {{ $track }}</span>
                                @endif
                                <span class="text-slate-300">•</span>
                                <span class="text-slate-600 font-medium">
                                    Total Assigned Classes: <strong class="text-[#0369a1]">{{ $routines->flatten(1)->count() }} classes</strong>
                                </span>
                                <span class="text-slate-300">•</span>
                                <span class="text-slate-500 text-xs">
                                    Format: <strong class="text-[#0f2b5c]">A4 Landscape (Time Slots × Sat-Fri)</strong>
                                </span>
                            </div>

                            <div class="no-print flex items-center gap-2">
                                <!-- Switch View Mode Pill -->
                                <div class="inline-flex rounded-xl bg-[#edf3f8] p-1 border border-[#cbdde9] text-xs font-bold">
                                    <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => 'grid']) }}" class="px-3 py-1.5 rounded-lg transition {{ $viewMode === 'grid' ? 'bg-[#0f2b5c] text-white font-black shadow' : 'text-slate-600 hover:text-[#0f2b5c]' }}">
                                        Timetable Grid
                                    </a>
                                    <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => 'cards']) }}" class="px-3 py-1.5 rounded-lg transition {{ $viewMode === 'cards' ? 'bg-[#0f2b5c] text-white font-black shadow' : 'text-slate-600 hover:text-[#0f2b5c]' }}">
                                        Day Cards
                                    </a>
                                </div>

                                <!-- Download Image (PNG) -->
                                <button type="button" onclick="exportRoutineImage('weeklyRoutineContainer', 'DIU_SWE_Batch_{{ $batch }}_{{ $section }}_Weekly_Routine_A4_Landscape')" title="Download full routine as high-resolution PNG image with zero cutout" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-[#0f2b5c] hover:bg-[#1e3a8a] text-white text-xs font-bold shadow-md shadow-sky-900/15 transition">
                                    <svg class="w-3.5 h-3.5 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span>Download Image</span>
                                </button>

                                <!-- Download CSV -->
                                <a href="{{ route('routine.export.csv', ['batch' => $batch, 'section' => $section, 'major_track' => $track]) }}" title="Download well-formatted CSV spreadsheet matching the image structure" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold transition shadow-xs">
                                    <svg class="w-3.5 h-3.5 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    <span>Download CSV</span>
                                </a>
                            </div>
                        </div>

                        {{-- Conflict / Concurrent Slot Notification Banner --}}
                        @if(!empty($hasConflicts) && !empty($softConflicts))
                            <div class="no-print mb-4 rounded-xl border border-amber-300 bg-amber-50/90 p-3.5 text-amber-900 shadow-xs flex items-start gap-3">
                                <div class="p-1.5 rounded-lg bg-amber-200 text-amber-900 shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center justify-between flex-wrap gap-2">
                                        <h4 class="text-xs font-black uppercase tracking-wide text-amber-950 flex items-center gap-1.5">
                                            Concurrent / Multi-Stream Slots Detected ({{ count($softConflicts) }})
                                        </h4>
                                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-amber-200 text-amber-950 border border-amber-300">
                                            Split / Stacked View Active (Zero Data Loss)
                                        </span>
                                    </div>
                                    <p class="text-[11px] text-amber-800 mt-1 leading-relaxed">
                                        Multiple streams (e.g. parallel elective tracks SE/DS/ST or lab subgroups) share scheduled time intervals. All courses are rendered below without omission or overlap.
                                    </p>
                                </div>
                            </div>
                        @endif

                        {{-- VIEW OPTION A: WEEKLY TIMETABLE GRID MATRIX (A4 LANDSCAPE: TIME ROWS x SAT-FRI COLUMNS) --}}
                        @if($viewMode === 'grid')
                            <div id="weeklyRoutineContainer" class="rounded-2xl border border-[#cbdde9] bg-white shadow-md p-0 overflow-hidden">
                                
                                <!-- Integrated Header for Landscape Display and High-Res Image Export (Clean Logo, No Cutouts) -->
                                <div class="px-4 py-3 bg-[#0f2b5c] text-white flex items-center justify-between border-b border-[#091a38]">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="DIU SWE Logo" class="w-10 h-10 object-contain shrink-0 drop-shadow-sm">
                                        <div>
                                            <div class="text-sm font-black tracking-wide flex items-center gap-1.5">
                                                <span>Daffodil International University</span>
                                                <span class="text-sky-300">•</span>
                                                <span class="text-sky-200">Dept of SWE</span>
                                            </div>
                                            <div class="text-[11px] text-sky-100 font-semibold">
                                                Class Routine • Batch {{ $batch }} • Section {{ $section }} @if($track)({{ $track }})@endif • Fall 2026 Academic Session
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right text-[10px] leading-tight">
                                        <div class="font-mono text-sky-200 font-bold">Effective: Sept 19, 2026</div>
                                        <div class="text-slate-300 text-[9.5px]">Ashulia Smart City (DSC) • A4 Landscape</div>
                                    </div>
                                </div>

                                <div class="overflow-x-auto">
                                    <table class="w-full border-collapse text-left text-xs print-table" style="table-layout: fixed; width: 100%;">
                                        <colgroup>
                                            <col style="width: 11%;">
                                            <col style="width: 12.71%;">
                                            <col style="width: 12.71%;">
                                            <col style="width: 12.71%;">
                                            <col style="width: 12.71%;">
                                            <col style="width: 12.71%;">
                                            <col style="width: 12.71%;">
                                            <col style="width: 12.71%;">
                                        </colgroup>
                                        <thead>
                                            <tr class="bg-[#142d47] text-white border-b border-[#0f2b5c]">
                                                <th class="p-2 sm:p-2.5 font-black uppercase tracking-wider text-sky-300 border-r border-[#203a58] text-center">
                                                    <div>Time</div>
                                                    <div class="text-[9px] font-normal text-slate-300">Slots</div>
                                                </th>
                                                <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#203a58]">
                                                    <div class="text-white font-extrabold text-xs">Saturday</div>
                                                    <div class="text-[9.5px] font-medium text-sky-300">sat</div>
                                                </th>
                                                <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#203a58]">
                                                    <div class="text-white font-extrabold text-xs">Sunday</div>
                                                    <div class="text-[9.5px] font-medium text-sky-300">sun</div>
                                                </th>
                                                <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#203a58]">
                                                    <div class="text-white font-extrabold text-xs">Monday</div>
                                                    <div class="text-[9.5px] font-medium text-sky-300">Mon</div>
                                                </th>
                                                <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#203a58]">
                                                    <div class="text-white font-extrabold text-xs">Tuesday</div>
                                                    <div class="text-[9.5px] font-medium text-sky-300">tues</div>
                                                </th>
                                                <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#203a58]">
                                                    <div class="text-white font-extrabold text-xs">Wednesday</div>
                                                    <div class="text-[9.5px] font-medium text-sky-300">Wed</div>
                                                </th>
                                                <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#203a58]">
                                                    <div class="text-white font-extrabold text-xs">Thursday</div>
                                                    <div class="text-[9.5px] font-medium text-sky-300">Thussday</div>
                                                </th>
                                                <th class="p-2 sm:p-2.5 font-bold text-center">
                                                    <div class="text-white font-extrabold text-xs">Friday</div>
                                                    <div class="text-[9.5px] font-medium text-amber-300">Friday</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-[#cbdde9] bg-white">
                                            @php
                                                $orderedDays = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                                            @endphp
                                            @foreach($timeSlots as $slot)
                                                <tr class="hover:bg-sky-50/50 transition-colors">
                                                    <!-- Time Slot Header Cell (First Column) -->
                                                    <td class="p-2 sm:p-2.5 bg-[#f0f5fa] border-r border-[#cbdde9] align-top text-center">
                                                        <div class="text-xs font-black text-[#0f2b5c] font-mono tracking-tight">
                                                            {{ $slot['short'] ?? '8:30-10:00' }}
                                                        </div>
                                                        <div class="text-[9.5px] font-medium text-slate-500 mt-0.5 leading-tight">
                                                            {{ $slot['label'] }}
                                                        </div>
                                                    </td>

                                                    <!-- 7 Academic Day Columns (Saturday to Friday) -->
                                                    @foreach($orderedDays as $day)
                                                        @php
                                                            $slotClasses = $weeklyGrid[$day][$slot['label']] ?? [];
                                                            $classCount = count($slotClasses);
                                                        @endphp
                                                        <td class="p-1.5 sm:p-2 border-r border-[#cbdde9] last:border-r-0 align-top">
                                                            @if(!empty($slotClasses))
                                                                <div class="space-y-1.5">
                                                                    @if($classCount > 1)
                                                                        <div class="flex items-center justify-between text-[7.5px] font-extrabold uppercase px-1.5 py-0.5 rounded bg-amber-100 text-amber-900 border border-amber-300">
                                                                            <span class="truncate">⚡ {{ $slotClasses[0]->conflict_label ?? 'Concurrent Slot' }}</span>
                                                                            <span class="shrink-0 ml-1 font-mono font-black">{{ $classCount }} Classes</span>
                                                                        </div>
                                                                    @endif

                                                                    @foreach($slotClasses as $cls)
                                                                        @php
                                                                            $isCustom = in_array($cls->id, $customSlotIds);
                                                                            $isConflict = !empty($cls->is_conflict) || $classCount > 1;
                                                                            $cardBorder = $isConflict ? 'border-amber-300' : 'border-[#bae6fd]';
                                                                            $cardBg = $isConflict ? 'bg-amber-50/80' : 'bg-[#f0f7ff]';
                                                                            $cardHover = $isConflict ? 'hover:border-amber-500' : 'hover:border-sky-500';
                                                                        @endphp
                                                                        <div class="group relative rounded-lg border {{ $cardBorder }} {{ $cardBg }} p-2 shadow-xs {{ $cardHover }} hover:shadow-sm transition-all duration-150 print-card">
                                                                            @if(!empty($cls->is_continuation))
                                                                                <div class="mb-1 inline-flex items-center gap-1 text-[8px] font-bold px-1.5 py-0.2 rounded bg-sky-100 text-sky-800 border border-sky-300">
                                                                                    <span>⏱ {{ $cls->continuation_note ?? 'Continuation Slot' }}</span>
                                                                                </div>
                                                                            @endif

                                                                            <!-- Course Code & Name -->
                                                                            <div class="flex items-start justify-between gap-1 mb-1">
                                                                                <div class="min-w-0">
                                                                                    <span class="font-black text-xs text-[#0f2b5c] tracking-wide block">
                                                                                        {{ $cls->course_id }}
                                                                                        @if(!empty($cls->section) && $classCount > 1)
                                                                                            <span class="text-[9.5px] text-slate-500 font-normal">({{ $cls->section }})</span>
                                                                                        @endif
                                                                                    </span>
                                                                                    <span class="text-[10px] font-semibold text-[#0369a1] leading-tight block line-clamp-2" title="{{ $cls->course_name ?? $cls->course_id }}">
                                                                                        {{ $cls->course_name ?? $cls->course_id }}
                                                                                    </span>
                                                                                </div>
                                                                                @if($cls->major_track)
                                                                                    <span class="shrink-0 text-[8.5px] font-extrabold uppercase px-1 py-0.2 rounded bg-amber-100 text-amber-800 border border-amber-300">
                                                                                        {{ $cls->major_track }}
                                                                                    </span>
                                                                                @endif
                                                                            </div>

                                                                            <!-- Faculty Initials & Full Name -->
                                                                            <div class="mb-1 text-[10px] leading-tight">
                                                                                <div class="flex items-center gap-1 font-bold text-[#1e293b]">
                                                                                    <span class="px-1 py-0.2 rounded bg-indigo-100 text-indigo-800 font-mono text-[9.5px] border border-indigo-200 shrink-0">
                                                                                        {{ $cls->teacher_initials }}
                                                                                    </span>
                                                                                    <span class="truncate" title="{{ $cls->teacher_name }} ({{ $cls->teacher_designation }})">
                                                                                        {{ $cls->teacher_name }}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="text-[9px] text-slate-500 truncate pl-0.5 mt-0.5" title="{{ $cls->teacher_designation }}">
                                                                                    {{ $cls->teacher_designation }}
                                                                                </div>
                                                                            </div>

                                                                            <!-- Classroom & Building -->
                                                                            <div class="flex items-center justify-between text-[9.5px] pt-1 border-t border-[#cbdde9] text-slate-700">
                                                                                <span class="inline-flex items-center gap-1 font-bold text-emerald-700">
                                                                                    <svg class="w-2.5 h-2.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                                                                    Room {{ $cls->classroom_no }}
                                                                                </span>
                                                                                <span class="text-slate-500 text-[8.5px] font-mono">
                                                                                    {{ $cls->building }}
                                                                                </span>
                                                                            </div>

                                                                            <!-- Quick Actions (Hidden in Image Export & Print) -->
                                                                            <div class="no-print mt-1.5 pt-1 flex items-center justify-between border-t border-[#cbdde9]">
                                                                                <form method="POST" action="{{ route('custom.toggle') }}">
                                                                                    @csrf
                                                                                    <input type="hidden" name="slot_id" value="{{ $cls->id }}">
                                                                                    <button type="submit" class="text-[9.5px] font-bold inline-flex items-center gap-1 transition {{ $isCustom ? 'text-rose-600 hover:text-rose-700' : 'text-slate-500 hover:text-sky-700' }}">
                                                                                        @if($isCustom)
                                                                                            <span>✓ Added</span>
                                                                                        @else
                                                                                            <span>+ Custom</span>
                                                                                        @endif
                                                                                    </button>
                                                                                </form>
                                                                                <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $cls->teacher_initials]) }}" class="text-[9.5px] font-bold text-sky-700 hover:underline">
                                                                                    Faculty &rarr;
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                @if($day === 'Friday')
                                                                    <!-- Clean Weekend Cell -->
                                                                    <div class="h-full min-h-[58px] rounded border border-dashed border-slate-200 bg-slate-50/70 flex flex-col items-center justify-center p-1 text-slate-400 select-none">
                                                                        <span class="text-[9.5px] font-bold text-slate-500">Weekend</span>
                                                                        <span class="text-[8px] text-slate-400">No Scheduled Class</span>
                                                                    </div>
                                                                @else
                                                                    <!-- Clean Free Slot indicator -->
                                                                    <div class="h-full min-h-[58px] rounded border border-dashed border-slate-200 bg-slate-50/40 flex flex-col items-center justify-center p-1 text-slate-400 select-none">
                                                                        <span class="text-[10px] font-medium text-slate-400">—</span>
                                                                        <span class="text-[8px] text-slate-400 font-mono">Free Slot</span>
                                                                    </div>
                                                                @endif
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
                            {{-- VIEW OPTION B: DAY-BY-DAY CARDS VIEW --}}
                            <div class="space-y-6">
                                @forelse($routines as $dayName => $slots)
                                    <section class="overflow-hidden rounded-2xl border border-[#cbdde9] bg-white shadow-sm">
                                        <div class="border-b border-[#cbdde9] bg-[#f0f5fa] px-5 py-3.5 flex items-center justify-between">
                                            <h3 class="text-base font-extrabold uppercase tracking-wider text-[#0f2b5c] flex items-center gap-2">
                                                <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                {{ $dayName }}
                                            </h3>
                                            <span class="text-xs font-bold text-[#0f2b5c] bg-white px-2.5 py-1 rounded-full border border-[#cbdde9]">
                                                {{ $slots->count() }} Classes
                                            </span>
                                        </div>
                                        <div class="p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            @foreach($slots as $slot)
                                                @php
                                                    $isCustom = in_array($slot->id, $customSlotIds);
                                                @endphp
                                                <article class="rounded-xl border border-[#cbdde9] bg-[#f8fafc] p-4 hover:border-sky-500 hover:shadow-sm transition-all duration-200">
                                                    <div class="flex items-center justify-between text-xs font-mono font-bold text-sky-700 pb-2 border-b border-[#cbdde9]">
                                                        <span>{{ $slot->start_time_formatted ?? date('h:i A', strtotime($slot->start_time)) }} — {{ $slot->end_time_formatted ?? date('h:i A', strtotime($slot->end_time)) }}</span>
                                                        @if($slot->major_track)
                                                            <span class="px-2 py-0.5 rounded text-[10px] bg-amber-100 text-amber-800 border border-amber-300 uppercase font-sans font-extrabold">
                                                                {{ $slot->major_track }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="mt-3">
                                                        <h4 class="text-xl font-black text-[#0f2b5c] tracking-tight">
                                                            {{ $slot->course_id }}
                                                            @if(!empty($slot->section))
                                                                <span class="text-xs text-slate-500 font-semibold font-sans">({{ $slot->section }})</span>
                                                            @endif
                                                        </h4>
                                                        @if(!empty($slot->course_name))
                                                            <p class="text-xs font-semibold text-[#0369a1] mt-0.5">{{ $slot->course_name }}</p>
                                                        @endif
                                                        <div class="mt-2.5 space-y-1.5 text-xs text-slate-700">
                                                            <div class="flex items-center gap-2">
                                                                <span class="px-1.5 py-0.5 rounded bg-indigo-100 text-indigo-800 font-mono text-[11px] font-bold border border-indigo-200">
                                                                    {{ $slot->teacher_initials }}
                                                                </span>
                                                                <span class="font-bold text-[#0f2b5c]">{{ $slot->teacher_name }}</span>
                                                            </div>
                                                            <p class="text-[11px] text-slate-500 pl-1">{{ $slot->teacher_designation }}</p>
                                                            <div class="flex items-center justify-between pt-2 border-t border-[#cbdde9] text-slate-700">
                                                                <span class="font-bold text-emerald-700 flex items-center gap-1">
                                                                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                                                    Room {{ $slot->classroom_no }}
                                                                </span>
                                                                <span class="text-xs font-mono text-slate-500">{{ $slot->building }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="no-print mt-3 pt-2.5 flex items-center justify-between border-t border-[#cbdde9]">
                                                        <form method="POST" action="{{ route('custom.toggle') }}">
                                                            @csrf
                                                            <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                                                            <button type="submit" class="text-xs font-bold transition {{ $isCustom ? 'text-rose-600' : 'text-slate-500 hover:text-sky-700' }}">
                                                                {{ $isCustom ? '✓ In Custom Routine' : '+ Add to Custom' }}
                                                            </button>
                                                        </form>
                                                        <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $slot->teacher_initials]) }}" class="text-xs font-bold text-sky-700 hover:underline">
                                                            Faculty Schedule &rarr;
                                                        </a>
                                                    </div>
                                                </article>
                                            @endforeach
                                        </div>
                                    </section>
                                @empty
                                    <div class="rounded-2xl border border-dashed border-[#cbdde9] bg-white p-12 text-center text-slate-500">
                                        <p class="text-lg font-bold text-[#0f2b5c]">No routine classes found for Batch {{ $batch }} - Section {{ $section }}.</p>
                                        <p class="text-xs text-slate-400 mt-1">Try switching to another section or clearing major track filters.</p>
                                    </div>
                                @endforelse
                            </div>
                        @endif

                        <!-- Print Footer Legend Table (Included when downloading image / printing) -->
                        <div class="print-only mt-6 pt-3 border-t-2 border-slate-900 text-xs">
                            <h4 class="font-black text-xs uppercase mb-1.5 text-slate-950">Faculty Identification Key (Batch {{ $batch }}-{{ $section }})</h4>
                            <div class="grid grid-cols-2 gap-x-6 gap-y-1">
                                @php
                                    $uniqueInitials = $routines->flatten(1)->pluck('teacher_initials')->unique()->sort();
                                @endphp
                                @foreach($uniqueInitials as $init)
                                    @php $f = App\Services\FacultyService::getFaculty($init); @endphp
                                    <div class="border-b border-slate-200 py-0.5 flex items-center justify-between text-[9px]">
                                        <span class="font-black font-mono">[{{ $init }}]</span>
                                        <span class="font-bold text-slate-900">{{ $f['name'] }}</span>
                                        <span class="text-slate-600 text-[8.5px]">({{ $f['designation'] }})</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-4 flex items-center justify-between text-slate-600 text-[9px]">
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
                        <div class="bg-white border border-[#cbdde9] rounded-2xl p-6 shadow-sm relative overflow-hidden">
                            <div class="max-w-3xl">
                                <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-sky-100 text-[#0369a1] text-xs font-bold mb-3 border border-sky-200">
                                    Faculty Identification & Schedule Ledger
                                </div>
                                <h2 class="text-xl sm:text-2xl font-black text-[#0f2b5c]">Department Faculty Schedules & Directory</h2>
                                <p class="text-slate-600 text-xs sm:text-sm mt-1">
                                    Search any faculty member by their 2-4 letter initial (e.g., <strong class="text-[#0369a1]">MRA, MAK, IM, AAA</strong>) or by full name to view their complete weekly routine.
                                </p>
                            </div>

                            <!-- Search Form -->
                            <form method="GET" action="{{ route('routine.index') }}" class="mt-6 flex flex-col sm:flex-row gap-3">
                                <input type="hidden" name="tab" value="faculty">
                                <div class="relative flex-1">
                                    <input type="text" name="faculty_initials" value="{{ $facultyQuery }}" placeholder="Enter initials (e.g. MRA) or full name (e.g. Ashek / Abdul Kader)..." class="w-full bg-[#f8fafc] border border-[#cbdde9] rounded-xl px-4 py-3 text-[#0f2b5c] font-semibold placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 transition text-sm">
                                </div>
                                <button type="submit" class="bg-[#0f2b5c] hover:bg-[#1e3a8a] text-white font-black px-6 py-3 rounded-xl transition shadow-md shadow-sky-900/15 text-sm flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    <span>Find Schedule</span>
                                </button>
                            </form>

                            <!-- Quick Click Faculty Chips -->
                            <div class="mt-5 pt-4 border-t border-[#cbdde9]">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#0f2b5c] mr-2">Popular Teachers:</span>
                                <div class="inline-flex flex-wrap gap-1.5 mt-2">
                                    @foreach($popularFaculty->take(16) as $init)
                                        @php $f = App\Services\FacultyService::getFaculty($init); @endphp
                                        <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $init]) }}" class="px-2.5 py-1 rounded-lg text-xs font-bold transition border {{ $facultyQuery === $init ? 'bg-[#0f2b5c] text-white border-[#0f2b5c] font-black' : 'bg-[#f0f5fa] text-[#0f2b5c] hover:bg-[#e2ecf5] border-[#cbdde9]' }}" title="{{ $f['name'] }} ({{ $f['designation'] }})">
                                            {{ $init }} <span class="text-[10px] text-slate-500 font-normal hidden sm:inline">• {{ Str::limit($f['name'], 14) }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Searched Faculty Schedule Display -->
                        @if(!empty($facultyQuery))
                            <div class="bg-white border border-[#cbdde9] rounded-2xl p-6 shadow-sm">
                                <!-- Faculty Profile Header -->
                                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-6 border-b border-[#cbdde9]">
                                    <div class="flex items-center gap-4">
                                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-sky-500 to-indigo-700 flex items-center justify-center text-white font-black text-xl font-mono shadow-md">
                                            {{ $facultyQuery }}
                                        </div>
                                        <div>
                                            <h3 class="text-xl sm:text-2xl font-black text-[#0f2b5c]">{{ $facultyInfo['name'] ?? $facultyQuery }}</h3>
                                            <p class="text-sm font-semibold text-[#0369a1]">{{ $facultyInfo['designation'] ?? 'Department Faculty' }}</p>
                                            <p class="text-xs text-slate-500 mt-0.5">Software Engineering Department • Daffodil International University</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-black text-[#0f2b5c] font-mono">{{ $facultyRoutines->flatten(1)->count() }}</div>
                                        <div class="text-xs font-bold text-slate-500 uppercase tracking-wider">Weekly Classes</div>
                                    </div>
                                </div>

                                <!-- Class Slots by Day -->
                                <div class="mt-6 space-y-6">
                                    @forelse($facultyRoutines as $day => $classes)
                                        <div class="rounded-xl border border-[#cbdde9] overflow-hidden">
                                            <div class="bg-[#f0f5fa] px-4 py-2.5 flex items-center justify-between border-b border-[#cbdde9]">
                                                <span class="font-extrabold text-[#0f2b5c] text-sm uppercase tracking-wider">{{ $day }}</span>
                                                <span class="text-xs font-mono text-slate-600">{{ $classes->count() }} slots</span>
                                            </div>
                                            <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                                @foreach($classes as $c)
                                                    <div class="p-3.5 rounded-xl border border-[#cbdde9] bg-[#f8fafc]">
                                                        <div class="flex items-center justify-between text-xs font-mono font-bold text-sky-700 mb-1.5">
                                                            <span>{{ date('h:i A', strtotime($c->start_time)) }} - {{ date('h:i A', strtotime($c->end_time)) }}</span>
                                                            <span class="px-2 py-0.5 rounded bg-sky-100 text-sky-800 font-sans text-[10px]">
                                                                Batch {{ $c->batch }}-{{ $c->section }}
                                                            </span>
                                                        </div>
                                                        <h5 class="text-base font-black text-[#0f2b5c]">{{ $c->course_id }}</h5>
                                                        @if(!empty($c->course_name))
                                                            <p class="text-xs font-semibold text-[#0369a1] mt-0.5">{{ $c->course_name }}</p>
                                                        @endif
                                                        <div class="mt-2 text-xs flex items-center justify-between text-slate-700">
                                                            <span class="text-emerald-700 font-bold">Room: {{ $c->classroom_no }}</span>
                                                            <span class="text-slate-500 font-mono">{{ $c->building }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @empty
                                        <div class="p-10 text-center text-slate-500">
                                            No scheduled routine classes found for initial <strong>{{ $facultyQuery }}</strong>.
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        @endif

                        <!-- Full Faculty Directory Table -->
                        <div class="bg-white border border-[#cbdde9] rounded-2xl p-6 shadow-sm">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6">
                                <div>
                                    <h3 class="text-lg font-black text-[#0f2b5c]">Full Faculty Directory ({{ count($facultyDirectory) }} Members)</h3>
                                    <p class="text-xs text-slate-500">Official names and designations matching the Fall 2026 Academic Routine document.</p>
                                </div>
                                <input type="text" id="facultyFilterInput" onkeyup="filterFacultyTable()" placeholder="Quick filter faculty table..." class="bg-[#f8fafc] border border-[#cbdde9] rounded-xl px-3.5 py-1.5 text-xs text-[#0f2b5c] placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 w-full sm:w-64">
                            </div>

                            <div class="overflow-x-auto">
                                <table id="facultyTable" class="w-full text-left text-xs sm:text-sm divide-y divide-[#cbdde9]">
                                    <thead>
                                        <tr class="text-slate-700 font-bold text-xs uppercase tracking-wider bg-[#f0f5fa]">
                                            <th class="py-3 px-3">Initial</th>
                                            <th class="py-3 px-4">Faculty Member Full Name</th>
                                            <th class="py-3 px-4">Academic Designation</th>
                                            <th class="py-3 px-3 text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#cbdde9] font-medium bg-white">
                                        @foreach($facultyDirectory as $init => $f)
                                            <tr class="hover:bg-sky-50/50 transition">
                                                <td class="py-3 px-3 font-mono font-bold text-[#0f2b5c]">
                                                    <span class="px-2 py-1 rounded bg-[#f0f5fa] border border-[#cbdde9]">{{ $init }}</span>
                                                </td>
                                                <td class="py-3 px-4 text-[#0f2b5c] font-bold">{{ $f['name'] }}</td>
                                                <td class="py-3 px-4 text-slate-600">{{ $f['designation'] }}</td>
                                                <td class="py-3 px-3 text-right">
                                                    <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $init]) }}" class="inline-flex items-center gap-1 text-xs font-bold text-sky-700 hover:text-sky-800">
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
                        <div class="bg-white border border-[#cbdde9] rounded-2xl p-6 shadow-sm">
                            <div class="max-w-3xl">
                                <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-bold mb-3 border border-emerald-200">
                                    Physical Spaces & Lab Availability Engine
                                </div>
                                <h2 class="text-xl sm:text-2xl font-black text-[#0f2b5c]">SWE Dedicated Free Room Tracker</h2>
                                <p class="text-slate-600 text-xs sm:text-sm mt-1">
                                    Tracks the 18 dedicated Software Engineering Department rooms and laboratories in real time. Perfect for group projects, self-study, and lab sessions.
                                </p>
                            </div>

                            <form method="GET" action="{{ route('routine.index') }}" class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
                                <input type="hidden" name="tab" value="empty_rooms">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-[#0f2b5c] mb-2">Academic Day</label>
                                    <select name="empty_day" onchange="this.form.submit()" class="w-full bg-[#f8fafc] border border-[#cbdde9] rounded-xl px-3.5 py-2.5 text-[#0f2b5c] font-semibold focus:outline-none focus:ring-2 focus:ring-emerald-500 transition text-sm">
                                        @foreach($days as $d)
                                            <option value="{{ $d }}" {{ $emptyDay === $d ? 'selected' : '' }}>{{ $d }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-[#0f2b5c] mb-2">Class Interval</label>
                                    <select name="empty_slot" onchange="this.form.submit()" class="w-full bg-[#f8fafc] border border-[#cbdde9] rounded-xl px-3.5 py-2.5 text-[#0f2b5c] font-semibold focus:outline-none focus:ring-2 focus:ring-emerald-500 transition text-sm">
                                        @foreach($timeSlots as $slot)
                                            @php $val = $slot['start'].' - '.$slot['end']; @endphp
                                            <option value="{{ $val }}" {{ $emptySlot === $val ? 'selected' : '' }}>
                                                {{ $slot['label'] }} ({{ $slot['short'] ?? '' }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-black px-4 py-2.5 rounded-xl transition shadow-md shadow-emerald-900/15 text-sm flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    <span>Inspect Spaces</span>
                                </button>
                            </form>
                        </div>

                        <!-- Stats Counters -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                            <div class="p-5 rounded-2xl bg-white border border-[#cbdde9] shadow-xs">
                                <div class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Rooms</div>
                                <div class="text-2xl sm:text-3xl font-black text-[#0f2b5c] font-mono mt-1">{{ count($dedicatedRooms) }}</div>
                            </div>
                            <div class="p-5 rounded-2xl bg-emerald-50 border border-emerald-200 shadow-xs">
                                <div class="text-xs font-bold text-emerald-800 uppercase tracking-wider">Available Free</div>
                                <div class="text-2xl sm:text-3xl font-black text-emerald-700 font-mono mt-1">{{ $roomAnalysis['available_count'] }}</div>
                            </div>
                            <div class="p-5 rounded-2xl bg-rose-50 border border-rose-200 shadow-xs">
                                <div class="text-xs font-bold text-rose-800 uppercase tracking-wider">Occupied Rooms</div>
                                <div class="text-2xl sm:text-3xl font-black text-rose-700 font-mono mt-1">{{ $roomAnalysis['occupied_count'] }}</div>
                            </div>
                            <div class="p-5 rounded-2xl bg-white border border-[#cbdde9] shadow-xs">
                                <div class="text-xs font-bold text-slate-500 uppercase tracking-wider">Availability</div>
                                <div class="text-2xl sm:text-3xl font-black text-sky-700 font-mono mt-1">
                                    {{ round(($roomAnalysis['available_count'] / count($dedicatedRooms)) * 100) }}%
                                </div>
                            </div>
                        </div>

                        <!-- Room Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($roomAnalysis['rooms'] as $rm)
                                @php $isFree = ($rm['status'] === 'Available / Empty'); @endphp
                                <div class="rounded-2xl border p-5 transition-all {{ $isFree ? 'bg-white border-emerald-300 shadow-xs hover:border-emerald-500' : 'bg-slate-50 border-rose-200' }}">
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="text-xl font-black text-[#0f2b5c] font-mono">{{ $rm['room_no'] }}</h4>
                                        <span class="px-2.5 py-1 rounded-full text-xs font-extrabold {{ $isFree ? 'bg-emerald-100 text-emerald-800 border border-emerald-300' : 'bg-rose-100 text-rose-800 border border-rose-300' }}">
                                            {{ $isFree ? 'Available' : 'Occupied' }}
                                        </span>
                                    </div>
                                    <div class="text-xs text-slate-600">
                                        <span>Building: <strong class="text-[#0f2b5c]">{{ $rm['building'] }}</strong></span>
                                    </div>
                                    @if(!$isFree && isset($rm['occupied_by']))
                                        <div class="mt-3 pt-3 border-t border-[#cbdde9] text-xs space-y-1">
                                            <div class="text-[#0f2b5c] font-bold">Class: {{ $rm['occupied_by']['course_id'] }}</div>
                                            <div class="text-slate-600">
                                                Faculty: <strong class="text-[#0f2b5c]">{{ $rm['occupied_by']['teacher_name'] }} ({{ $rm['occupied_by']['teacher_initials'] }})</strong>
                                            </div>
                                            <div class="text-slate-500 text-[11px]">Batch {{ $rm['occupied_by']['batch'] }} • Sec {{ $rm['occupied_by']['section'] }}</div>
                                        </div>
                                    @else
                                        <div class="mt-3 pt-3 border-t border-emerald-100 text-[11px] text-emerald-700 font-semibold">
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
                        <div class="bg-white border border-[#cbdde9] rounded-2xl p-6 shadow-sm">
                            <div class="max-w-3xl">
                                <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-violet-100 text-violet-800 text-xs font-bold mb-3 border border-violet-200">
                                    Cross-Batch & Retake Course Organizer
                                </div>
                                <h2 class="text-xl sm:text-2xl font-black text-[#0f2b5c]">Customizable Routine Builder</h2>
                                <p class="text-slate-600 text-xs sm:text-sm mt-1">
                                    Lookup courses across all batches, select your registered sections, and compile an individualized weekly timetable with zero time clashes.
                                </p>
                            </div>

                            <!-- Search Course Input -->
                            <form method="GET" action="{{ route('routine.index') }}" class="mt-6 flex flex-col sm:flex-row gap-3">
                                <input type="hidden" name="tab" value="custom">
                                <div class="relative flex-1">
                                    <input type="text" name="course_search" value="{{ $courseSearch }}" placeholder="Enter Course Code (e.g. SWE112, SE223, MAT101)..." class="w-full bg-[#f8fafc] border border-[#cbdde9] rounded-xl px-4 py-3 text-[#0f2b5c] font-semibold uppercase placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-violet-500 transition text-sm">
                                </div>
                                <button type="submit" class="bg-violet-700 hover:bg-violet-600 text-white font-bold px-6 py-3 rounded-xl transition shadow-md shadow-violet-900/15 text-sm flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4 text-violet-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    <span>Search Slots</span>
                                </button>
                            </form>
                        </div>

                        <!-- Course Search Results Ledger -->
                        @if(!empty($courseSearch))
                            <div class="bg-white border border-[#cbdde9] rounded-2xl p-6 shadow-sm">
                                <div class="flex items-center justify-between pb-4 border-b border-[#cbdde9]">
                                    <div>
                                        <h3 class="text-lg font-black text-[#0f2b5c]">Search Results for "{{ $courseSearch }}"</h3>
                                        <p class="text-xs text-slate-500">Found <strong class="text-violet-700">{{ $courseSearchResults->flatten(1)->count() }}</strong> available class slots across all batches and sections.</p>
                                    </div>
                                    <a href="{{ route('routine.index', ['tab' => 'custom']) }}" class="text-xs font-bold text-slate-500 hover:text-rose-600 transition">
                                        Clear Search
                                    </a>
                                </div>
                                <div class="mt-4 space-y-4">
                                    @forelse($courseSearchResults as $dayName => $daySlots)
                                        <div class="rounded-xl border border-[#cbdde9] overflow-hidden">
                                            <div class="bg-[#f0f5fa] px-4 py-2 border-b border-[#cbdde9] flex items-center justify-between">
                                                <span class="font-extrabold text-[#0f2b5c] text-xs uppercase">{{ $dayName }}</span>
                                                <span class="text-[11px] font-mono text-slate-500">{{ $daySlots->count() }} slots</span>
                                            </div>
                                            <div class="p-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                                @foreach($daySlots as $s)
                                                    @php $isCustom = in_array($s->id, $customSlotIds); @endphp
                                                    <div class="p-3 rounded-lg border border-[#cbdde9] bg-[#f8fafc] hover:border-violet-400 transition">
                                                        <div class="flex items-center justify-between text-xs font-mono font-bold text-sky-700 mb-1">
                                                            <span>{{ $s->start_time_formatted }} - {{ $s->end_time_formatted }}</span>
                                                            <span class="px-1.5 py-0.5 rounded bg-violet-100 text-violet-800 text-[10px] font-sans font-bold">
                                                                Batch {{ $s->batch }}-{{ $s->section }}
                                                            </span>
                                                        </div>
                                                        <div class="font-black text-sm text-[#0f2b5c]">{{ $s->course_id }}</div>
                                                        <div class="text-xs font-semibold text-[#0369a1]">{{ $s->course_name }}</div>
                                                        <div class="mt-1 text-xs text-slate-700">
                                                            <span class="font-bold">{{ $s->teacher_initials }}</span> • {{ $s->teacher_name }}
                                                        </div>
                                                        <div class="mt-2 flex items-center justify-between text-[11px] text-slate-500 pt-1.5 border-t border-[#cbdde9]">
                                                            <span class="font-bold text-emerald-700">Room {{ $s->classroom_no }}</span>
                                                            <form method="POST" action="{{ route('custom.toggle') }}">
                                                                @csrf
                                                                <input type="hidden" name="slot_id" value="{{ $s->id }}">
                                                                <button type="submit" class="px-2 py-0.5 rounded text-xs font-bold transition {{ $isCustom ? 'bg-rose-100 text-rose-700 hover:bg-rose-200' : 'bg-violet-100 text-violet-800 hover:bg-violet-200' }}">
                                                                    {{ $isCustom ? '✓ In Custom' : '+ Add to Routine' }}
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @empty
                                        <div class="p-6 text-center text-slate-500 text-xs">
                                            No routine slots found matching course code "{{ $courseSearch }}".
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        @endif

                        <!-- Custom Timetable Result Summary -->
                        <div class="bg-white border border-[#cbdde9] rounded-2xl p-6 shadow-sm">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-5 border-b border-[#cbdde9]">
                                <div>
                                    <h3 class="text-lg font-black text-[#0f2b5c]">Your Selected Custom Routine</h3>
                                    <p class="text-xs text-slate-500">Total Selected Slots: <strong class="text-sky-700">{{ count($customSlotIds) }}</strong> classes.</p>
                                </div>
                                @if(count($customSlotIds) > 0)
                                    <div class="flex items-center gap-2">
                                        <button type="button" onclick="exportRoutineImage('customRoutineContainer', 'DIU_SWE_Custom_Student_Routine_A4_Landscape')" class="px-3.5 py-2 rounded-xl bg-[#0f2b5c] hover:bg-[#1e3a8a] text-xs font-bold text-white shadow transition flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            <span>Download Custom Image</span>
                                        </button>
                                        <form method="POST" action="{{ route('custom.clear') }}">
                                            @csrf
                                            <button type="submit" class="px-3.5 py-2 rounded-xl bg-rose-600 hover:bg-rose-500 text-xs font-bold text-white transition">
                                                Reset Custom Routine
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>

                            @if(!empty($customHasConflicts) && !empty($customSoftConflicts))
                                <div class="mt-4 rounded-xl border border-amber-300 bg-amber-50 p-3 text-amber-900 text-xs flex items-center gap-2">
                                    <span class="font-bold">⚡ Scheduling Overlap Detected:</span>
                                    <span>{{ count($customSoftConflicts) }} slot(s) contain concurrent courses. Both courses are preserved and rendered below.</span>
                                </div>
                            @endif

                            @if(count($customSlotIds) > 0)
                                <!-- Custom Weekly Grid in identical 8-Column A4 Landscape Structure -->
                                <div id="customRoutineContainer" class="mt-6 rounded-xl border border-[#cbdde9] bg-white overflow-hidden shadow-xs">
                                    <div class="px-4 py-2.5 bg-[#0f2b5c] text-white flex items-center justify-between">
                                        <div class="font-bold text-xs">Custom Student Schedule Matrix (A4 Landscape)</div>
                                        <div class="text-[10px] text-sky-200">Dept of SWE • Daffodil International University</div>
                                    </div>
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-left text-xs print-table" style="table-layout: fixed; width: 100%;">
                                            <colgroup>
                                                <col style="width: 11%;">
                                                <col style="width: 12.71%;">
                                                <col style="width: 12.71%;">
                                                <col style="width: 12.71%;">
                                                <col style="width: 12.71%;">
                                                <col style="width: 12.71%;">
                                                <col style="width: 12.71%;">
                                                <col style="width: 12.71%;">
                                            </colgroup>
                                            <thead>
                                                <tr class="bg-[#142d47] text-white border-b border-[#0f2b5c]">
                                                    <th class="p-2.5 font-bold border-r border-[#203a58] text-center">Time</th>
                                                    <th class="p-2.5 font-bold text-center border-r border-[#203a58]">Saturday</th>
                                                    <th class="p-2.5 font-bold text-center border-r border-[#203a58]">Sunday</th>
                                                    <th class="p-2.5 font-bold text-center border-r border-[#203a58]">Monday</th>
                                                    <th class="p-2.5 font-bold text-center border-r border-[#203a58]">Tuesday</th>
                                                    <th class="p-2.5 font-bold text-center border-r border-[#203a58]">Wednesday</th>
                                                    <th class="p-2.5 font-bold text-center border-r border-[#203a58]">Thursday</th>
                                                    <th class="p-2.5 font-bold text-center">Friday</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-[#cbdde9] bg-white">
                                                @php
                                                    $orderedDays = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                                                @endphp
                                                @foreach($timeSlots as $slot)
                                                    <tr class="hover:bg-sky-50/50">
                                                        <td class="p-2 bg-[#f0f5fa] border-r border-[#cbdde9] font-mono text-center text-xs font-bold text-[#0f2b5c]">
                                                            <div>{{ $slot['short'] ?? '8:30-10:00' }}</div>
                                                            <div class="text-[9px] text-slate-500 font-normal font-sans">{{ $slot['label'] }}</div>
                                                        </td>
                                                        @foreach($orderedDays as $day)
                                                            @php
                                                                $classes = $customWeeklyGrid[$day][$slot['label']] ?? [];
                                                            @endphp
                                                            <td class="p-1.5 border-r border-[#cbdde9] last:border-r-0 align-top">
                                                                @if(!empty($classes))
                                                                    @if(count($classes) > 1)
                                                                        <div class="mb-1 text-[7.5px] font-extrabold uppercase px-1 py-0.5 rounded bg-amber-100 text-amber-900 border border-amber-300">
                                                                            ⚡ {{ count($classes) }} Classes (Concurrent)
                                                                        </div>
                                                                    @endif
                                                                    @foreach($classes as $c)
                                                                        @php
                                                                            $isCustomConflict = count($classes) > 1;
                                                                            $cardBorder = $isCustomConflict ? 'border-amber-300' : 'border-[#bae6fd]';
                                                                            $cardBg = $isCustomConflict ? 'bg-amber-50/80' : 'bg-[#f0f7ff]';
                                                                        @endphp
                                                                        <div class="p-1.5 rounded {{ $cardBg }} border {{ $cardBorder }} mb-1 shadow-2xs">
                                                                            @if(!empty($c->is_continuation))
                                                                                <div class="text-[7.5px] font-bold text-sky-700 mb-0.5">⏱ Continuation</div>
                                                                            @endif
                                                                            <div class="font-extrabold text-[11px] text-[#0f2b5c]">
                                                                                {{ $c->course_id }}
                                                                                @if(!empty($c->section) && count($classes) > 1)
                                                                                    <span class="text-[9px] font-normal text-slate-500">({{ $c->section }})</span>
                                                                                @endif
                                                                            </div>
                                                                            <div class="text-[9.5px] font-semibold text-[#0369a1] line-clamp-2" title="{{ $c->course_name ?? $c->course_id }}">{{ $c->course_name ?? $c->course_id }}</div>
                                                                            <div class="text-[9px] text-slate-700 mt-0.5">
                                                                                <span class="font-bold">{{ $c->teacher_initials }}</span> • {{ $c->teacher_name }}
                                                                            </div>
                                                                            <div class="text-[9px] text-emerald-700 font-semibold mt-0.5">
                                                                                Room {{ $c->classroom_no }} ({{ $c->building }})
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <div class="text-center text-slate-300 text-[10px] py-3">—</div>
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
                                <div class="mt-4 p-8 text-center text-slate-500 border border-dashed border-[#cbdde9] rounded-xl">
                                    <p class="font-bold text-[#0f2b5c]">You haven't selected any courses for your custom routine yet.</p>
                                    <p class="text-xs text-slate-400 mt-1">Use the search box above to find courses by code and click "+ Add to Custom".</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                {{-- ============================================================== --}}
                {{-- TAB 5: COURSE OFFERINGS DIRECTORY                             --}}
                {{-- ============================================================== --}}
                @if($activeTab === 'offerings')
                    <div class="space-y-6">
                        <div class="bg-white border border-[#cbdde9] rounded-2xl p-6 shadow-sm">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <div class="max-w-2xl">
                                    <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-sky-100 text-[#0369a1] text-xs font-bold mb-2 border border-sky-200">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                        <span>DIU SWE Academic Offerings</span>
                                    </div>
                                    <h2 class="text-xl sm:text-2xl font-black text-[#0f2b5c]">Course Offer Directory</h2>
                                    <p class="text-slate-600 text-xs sm:text-sm mt-1">
                                        Official departmental course catalog with batch curriculum specifications, credit allocations, and major specialization tracks.
                                    </p>
                                </div>

                                <!-- Summary Counters -->
                                <div class="flex items-center gap-3">
                                    <div class="px-4 py-3 rounded-xl bg-[#f0f7fd] border border-[#cbdde9] text-center min-w-[100px]">
                                        <div class="text-2xl font-black text-[#0f2b5c]">{{ $offerings->count() }}</div>
                                        <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Courses Listed</div>
                                    </div>
                                    @if($offeringBatch == 41)
                                        <div class="px-4 py-3 rounded-xl bg-sky-50 border border-sky-200 text-center min-w-[100px]">
                                            <div class="text-2xl font-black text-sky-700">5</div>
                                            <div class="text-[11px] font-bold text-sky-600 uppercase tracking-wider">Major Tracks</div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Filter Controls Form -->
                            <form method="GET" action="{{ route('routine.index') }}" class="mt-6 pt-5 border-t border-[#cbdde9] flex flex-wrap gap-4 items-end">
                                <input type="hidden" name="tab" value="offerings">

                                <!-- Batch Selector -->
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-[#0f2b5c] mb-2">Filter by Batch</label>
                                    <select name="offering_batch" onchange="this.form.submit()" class="bg-[#f8fafc] border border-[#cbdde9] rounded-xl px-3.5 py-2.5 text-[#0f2b5c] font-semibold text-sm focus:ring-2 focus:ring-sky-500 focus:outline-none">
                                        @foreach($availableBatches as $b)
                                            <option value="{{ $b }}" {{ $offeringBatch == $b ? 'selected' : '' }}>Batch {{ $b }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Major / Specialization Track Selector (When Batch is 41) -->
                                @if($offeringBatch == 41)
                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wider text-[#0f2b5c] mb-2">Select Major / Track</label>
                                        <select name="offering_track" onchange="this.form.submit()" class="bg-[#f8fafc] border border-[#cbdde9] rounded-xl px-3.5 py-2.5 text-[#0f2b5c] font-semibold text-sm focus:ring-2 focus:ring-sky-500 focus:outline-none">
                                            <option value="ALL" {{ empty($offeringTrack) || $offeringTrack === 'ALL' ? 'selected' : '' }}>All Majors & Electives (19 Courses)</option>
                                            @foreach($availableTracks as $tCode => $tName)
                                                <option value="{{ $tCode }}" {{ $offeringTrack === $tCode ? 'selected' : '' }}>{{ $tName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </form>

                            <!-- Quick Filter Pills for Batch 41 Major Tracks -->
                            @if($offeringBatch == 41)
                                <div class="mt-4 pt-4 border-t border-slate-100">
                                    <div class="text-[11px] font-extrabold uppercase tracking-wider text-slate-500 mb-2.5 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                                        <span>Quick Filter by Major Track:</span>
                                    </div>
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => 41, 'offering_track' => 'ALL']) }}"
                                           class="px-3 py-1.5 rounded-lg text-xs font-bold border transition-all {{ empty($offeringTrack) || $offeringTrack === 'ALL' ? 'bg-[#0f2b5c] text-white border-[#0f2b5c] shadow-xs' : 'bg-white text-slate-700 border-slate-200 hover:bg-slate-50' }}">
                                            All Majors (19)
                                        </a>
                                        <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => 41, 'offering_track' => 'SE']) }}"
                                           class="px-3 py-1.5 rounded-lg text-xs font-bold border transition-all {{ $offeringTrack === 'SE' ? 'bg-blue-600 text-white border-blue-600 shadow-xs' : 'bg-blue-50/70 text-blue-700 border-blue-200 hover:bg-blue-100' }}">
                                            SE • Software Engineering (4)
                                        </a>
                                        <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => 41, 'offering_track' => 'DS']) }}"
                                           class="px-3 py-1.5 rounded-lg text-xs font-bold border transition-all {{ $offeringTrack === 'DS' ? 'bg-emerald-600 text-white border-emerald-600 shadow-xs' : 'bg-emerald-50/70 text-emerald-700 border-emerald-200 hover:bg-emerald-100' }}">
                                            DS • Data Science (4)
                                        </a>
                                        <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => 41, 'offering_track' => 'ST']) }}"
                                           class="px-3 py-1.5 rounded-lg text-xs font-bold border transition-all {{ $offeringTrack === 'ST' ? 'bg-purple-600 text-white border-purple-600 shadow-xs' : 'bg-purple-50/70 text-purple-700 border-purple-200 hover:bg-purple-100' }}">
                                            ST • Software Testing (4)
                                        </a>
                                        <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => 41, 'offering_track' => 'RE']) }}"
                                           class="px-3 py-1.5 rounded-lg text-xs font-bold border transition-all {{ $offeringTrack === 'RE' ? 'bg-amber-600 text-white border-amber-600 shadow-xs' : 'bg-amber-50/70 text-amber-700 border-amber-200 hover:bg-amber-100' }}">
                                            RE • Robotics Engineering (4)
                                        </a>
                                        <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => 41, 'offering_track' => 'CS']) }}"
                                           class="px-3 py-1.5 rounded-lg text-xs font-bold border transition-all {{ $offeringTrack === 'CS' ? 'bg-rose-600 text-white border-rose-600 shadow-xs' : 'bg-rose-50/70 text-rose-700 border-rose-200 hover:bg-rose-100' }}">
                                            CS • Cyber Security (3)
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Major-Specific Active Filter Alert Banner -->
                        @if($offeringBatch == 41 && !empty($offeringTrack) && $offeringTrack !== 'ALL')
                            <div class="p-4 rounded-xl border flex flex-col sm:flex-row sm:items-center justify-between gap-3 shadow-xs
                                {{ $offeringTrack === 'SE' ? 'bg-blue-50/80 border-blue-200 text-blue-950' : '' }}
                                {{ $offeringTrack === 'DS' ? 'bg-emerald-50/80 border-emerald-200 text-emerald-950' : '' }}
                                {{ $offeringTrack === 'ST' ? 'bg-purple-50/80 border-purple-200 text-purple-950' : '' }}
                                {{ $offeringTrack === 'RE' ? 'bg-amber-50/80 border-amber-200 text-amber-950' : '' }}
                                {{ $offeringTrack === 'CS' ? 'bg-rose-50/80 border-rose-200 text-rose-950' : '' }}">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl flex items-center justify-center font-black text-sm text-white shrink-0
                                        {{ $offeringTrack === 'SE' ? 'bg-blue-600' : '' }}
                                        {{ $offeringTrack === 'DS' ? 'bg-emerald-600' : '' }}
                                        {{ $offeringTrack === 'ST' ? 'bg-purple-600' : '' }}
                                        {{ $offeringTrack === 'RE' ? 'bg-amber-600' : '' }}
                                        {{ $offeringTrack === 'CS' ? 'bg-rose-600' : '' }}">
                                        {{ $offeringTrack }}
                                    </div>
                                    <div>
                                        <div class="font-black text-sm">
                                            Showing {{ $offerings->count() }} major-specific courses for {{ $availableTracks[$offeringTrack] ?? $offeringTrack }}
                                        </div>
                                        <div class="text-xs opacity-75">
                                            Batch 41 curriculum specialization requirements & electives
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => 41, 'offering_track' => 'ALL']) }}"
                                   class="text-xs font-bold underline hover:opacity-80 shrink-0 self-start sm:self-center">
                                    Show All Batch 41 Courses &rarr;
                                </a>
                            </div>
                        @endif

                        <!-- Offerings Table Card -->
                        <div class="bg-white border border-[#cbdde9] rounded-2xl p-6 shadow-sm">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs sm:text-sm divide-y divide-[#cbdde9]">
                                    <thead>
                                        <tr class="bg-[#f0f5fa] text-slate-700 font-bold uppercase text-xs">
                                            <th class="py-3 px-4">Course Code</th>
                                            <th class="py-3 px-4">Course Title</th>
                                            <th class="py-3 px-4">Credits</th>
                                            <th class="py-3 px-4">Batch</th>
                                            <th class="py-3 px-4">Major / Track</th>
                                            <th class="py-3 px-4 text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#cbdde9] bg-white font-medium">
                                        @forelse($offerings as $o)
                                            <tr class="hover:bg-sky-50/50 transition-colors">
                                                <td class="py-3 px-4">
                                                    <span class="inline-block px-2.5 py-1 rounded-md bg-slate-100 border border-slate-200 text-[#0f2b5c] font-mono font-bold text-xs">
                                                        {{ $o->course_code }}
                                                    </span>
                                                </td>
                                                <td class="py-3 px-4 font-bold text-[#0f2b5c]">
                                                    {{ $o->course_name }}
                                                </td>
                                                <td class="py-3 px-4">
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-slate-100 text-slate-700">
                                                        {{ $o->credits }} Cr
                                                    </span>
                                                </td>
                                                <td class="py-3 px-4 text-slate-600 font-semibold">
                                                    Batch {{ $o->batch }}
                                                </td>
                                                <td class="py-3 px-4">
                                                    @if($o->major_track === 'SE')
                                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-blue-100 text-blue-800 border border-blue-300 text-xs font-bold">
                                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span> SE • Software Engineering
                                                        </span>
                                                    @elseif($o->major_track === 'DS')
                                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-emerald-100 text-emerald-800 border border-emerald-300 text-xs font-bold">
                                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span> DS • Data Science
                                                        </span>
                                                    @elseif($o->major_track === 'ST')
                                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-purple-100 text-purple-800 border border-purple-300 text-xs font-bold">
                                                            <span class="w-1.5 h-1.5 rounded-full bg-purple-600"></span> ST • Software Testing
                                                        </span>
                                                    @elseif($o->major_track === 'RE')
                                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-amber-100 text-amber-800 border border-amber-300 text-xs font-bold">
                                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-600"></span> RE • Robotics Engineering
                                                        </span>
                                                    @elseif($o->major_track === 'CS')
                                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-rose-100 text-rose-800 border border-rose-300 text-xs font-bold">
                                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-600"></span> CS • Cyber Security
                                                        </span>
                                                    @elseif($o->major_track)
                                                        <span class="px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 border border-slate-300 text-xs font-bold">
                                                            {{ $o->major_track }}
                                                        </span>
                                                    @else
                                                        <span class="px-2 py-0.5 rounded text-slate-500 bg-slate-100 text-xs font-medium">Core Course</span>
                                                    @endif
                                                </td>
                                                <td class="py-3 px-4 text-right">
                                                    <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $o->batch, 'course_search' => $o->course_code]) }}"
                                                       class="inline-flex items-center gap-1 text-xs font-bold text-sky-600 hover:text-sky-800 hover:underline">
                                                        <span>View Routine Slots</span>
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="py-12 text-center text-slate-400">
                                                    <svg class="w-10 h-10 mx-auto text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    <div class="font-bold text-slate-600">No course offerings found</div>
                                                    <div class="text-xs text-slate-400 mt-1">Try selecting another major track or batch.</div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

            </main>

            <!-- Bottom Campus Footer -->
            <footer class="no-print mt-auto py-5 px-6 border-t border-[#cbdde9] bg-[#e2ecf5] text-xs text-slate-600 text-center">
                <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-3">
                    <div class="flex items-center gap-2 font-bold text-[#0f2b5c]">
                        <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="DIU Logo" class="w-6 h-6 object-contain shrink-0">
                        <span>Daffodil International University • Dept of SWE</span>
                    </div>
                    <div class="text-[11px] text-slate-500">
                        Fall 2026 Academic Timetable • Daffodil Smart City, Ashulia, Dhaka
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Client-Side Automation & Export Scripts -->
    <script>
        // Live Campus Clock
        function updateClock() {
            const clockEl = document.getElementById('liveClock');
            if (clockEl) {
                const now = new Date();
                clockEl.textContent = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true });
            }
        }
        setInterval(updateClock, 1000);
        updateClock();

        // Mobile Menu Drawer Toggle
        function toggleMobileMenu() {
            const nav = document.getElementById('sidebarNav');
            if (nav) {
                nav.classList.toggle('hidden');
            }
        }

        // Faculty Directory Table Filter
        function filterFacultyTable() {
            const input = document.getElementById('facultyFilterInput');
            if (!input) return;
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

        /**
         * Download Routine as High-Resolution A4 Landscape Image (PNG) with ZERO Cutouts.
         * Clones the table into an isolated off-screen 1400px container, strips interactive buttons,
         * and renders with html2canvas at scale 2 to guarantee all 8 columns and 6 rows are completely captured.
         */
        function exportRoutineImage(containerId, filename) {
            const original = document.getElementById(containerId);
            if (!original) {
                alert('Routine table container was not found on this page.');
                return;
            }

            showToast('Generating high-resolution A4 landscape routine image...', 'info');

            // 1. Create an off-screen clone wrapper fixed at exactly 1400px (A4 landscape ratio)
            const cloneWrapper = document.createElement('div');
            cloneWrapper.style.position = 'fixed';
            cloneWrapper.style.left = '-9999px';
            cloneWrapper.style.top = '0';
            cloneWrapper.style.width = '1400px';
            cloneWrapper.style.minWidth = '1400px';
            cloneWrapper.style.maxWidth = '1400px';
            cloneWrapper.style.zIndex = '-9999';
            cloneWrapper.style.background = '#ffffff';

            const cloned = original.cloneNode(true);
            cloned.style.width = '1400px';
            cloned.style.minWidth = '1400px';
            cloned.style.maxWidth = '1400px';
            cloned.style.margin = '0';
            cloned.style.overflow = 'visible';

            // Remove all .no-print elements inside the clone (e.g. action buttons, toggles)
            const noPrints = cloned.querySelectorAll('.no-print');
            noPrints.forEach(function(el) { el.remove(); });

            // Ensure table fills 100% width with fixed layout and visible overflow
            const tables = cloned.querySelectorAll('table');
            tables.forEach(function(t) {
                t.style.width = '100%';
                t.style.tableLayout = 'fixed';
            });
            const scrollWrappers = cloned.querySelectorAll('.overflow-x-auto');
            scrollWrappers.forEach(function(sw) {
                sw.style.overflow = 'visible';
            });

            cloneWrapper.appendChild(cloned);
            document.body.appendChild(cloneWrapper);

            if (typeof html2canvas === 'function') {
                html2canvas(cloned, {
                    scale: 2,
                    useCORS: true,
                    allowTaint: true,
                    backgroundColor: '#ffffff',
                    width: 1400,
                    windowWidth: 1400,
                    logging: false
                }).then(function(canvas) {
                    if (cloneWrapper.parentNode) {
                        document.body.removeChild(cloneWrapper);
                    }
                    const link = document.createElement('a');
                    link.download = (filename || 'DIU_SWE_Weekly_Routine_A4_Landscape') + '.png';
                    link.href = canvas.toDataURL('image/png');
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    showToast('Routine image downloaded successfully (High-Res A4 Landscape PNG)!', 'success');
                }).catch(function(err) {
                    if (cloneWrapper.parentNode) {
                        document.body.removeChild(cloneWrapper);
                    }
                    console.error('Failed to capture routine image:', err);
                    showToast('Error generating routine image. Please try again.', 'error');
                });
            } else {
                if (cloneWrapper.parentNode) {
                    document.body.removeChild(cloneWrapper);
                }
                alert('Image export engine is loading. Please try again in a moment.');
            }
        }

        // Notification Toast Helper
        function showToast(message, type) {
            type = type || 'info';
            let toast = document.getElementById('routineToast');
            if (!toast) {
                toast = document.createElement('div');
                toast.id = 'routineToast';
                document.body.appendChild(toast);
            }

            if (type === 'success') {
                toast.className = 'fixed bottom-5 right-5 z-50 px-4 py-3 rounded-xl shadow-2xl text-xs sm:text-sm font-bold flex items-center gap-2.5 bg-emerald-600 text-white border border-emerald-400/30 transition-all duration-300 transform translate-y-0 opacity-100';
                toast.innerHTML = '<svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>' + message + '</span>';
            } else if (type === 'error') {
                toast.className = 'fixed bottom-5 right-5 z-50 px-4 py-3 rounded-xl shadow-2xl text-xs sm:text-sm font-bold flex items-center gap-2.5 bg-rose-600 text-white border border-rose-400/30 transition-all duration-300 transform translate-y-0 opacity-100';
                toast.innerHTML = '<svg class="w-4 h-4 text-rose-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg><span>' + message + '</span>';
            } else {
                toast.className = 'fixed bottom-5 right-5 z-50 px-4 py-3 rounded-xl shadow-2xl text-xs sm:text-sm font-bold flex items-center gap-2.5 bg-[#0f2b5c] text-white border border-sky-400/30 transition-all duration-300 transform translate-y-0 opacity-100';
                toast.innerHTML = '<svg class="w-4 h-4 text-sky-200 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg><span>' + message + '</span>';
            }

            setTimeout(function() {
                if (toast) {
                    toast.classList.add('translate-y-10', 'opacity-0');
                    toast.classList.remove('translate-y-0', 'opacity-100');
                }
            }, 3500);
        }
    </script>
</body>
</html>
