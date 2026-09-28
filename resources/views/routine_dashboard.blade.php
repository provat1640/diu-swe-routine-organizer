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
                            800: '#075985',
                            900: '#0c4a6e',
                            950: '#082f49',
                        },
                        navy: {
                            50: '#f0f4f8',
                            100: '#d9e2ec',
                            200: '#bcccdc',
                            300: '#9fb3c8',
                            400: '#829ab1',
                            500: '#627d98',
                            600: '#486581',
                            700: '#334e68',
                            800: '#243b53',
                            850: '#1e304d',
                            900: '#1a2942',
                            950: '#142034',
                            card: '#213352',
                            cardHover: '#263b5f',
                            border: '#324970',
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
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(148, 163, 184, 0.25); border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(148, 163, 184, 0.45); }

        /* Strictly One Landscape Page Layout & Print Optimization */
        @page {
            size: landscape;
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
                border: 1px solid #64748b !important;
                padding: 2px 3px !important;
                color: #0f172a !important;
                vertical-align: top !important;
                word-wrap: break-word !important;
                page-break-inside: avoid !important;
                break-inside: avoid !important;
            }
            .print-table th {
                background: #f1f5f9 !important;
                font-weight: 800 !important;
                font-size: 7pt !important;
                text-align: center !important;
            }
        }

        .print-only { display: none; }
    </style>
</head>
<body class="bg-[#1a2942] text-slate-100 min-h-screen antialiased flex flex-col selection:bg-sky-500 selection:text-white">

    <!-- Top Status / Feedback Notification Bar -->
    @if(session('status'))
        <div class="no-print bg-emerald-600 text-white text-xs sm:text-sm font-semibold px-4 py-2 text-center shadow-md flex items-center justify-center gap-2">
            <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    <!-- PRINT-ONLY OFFICIAL COMPACT HEADER (Strictly 1 Landscape Sheet) -->
    <div class="print-only px-3 py-1.5 border-b border-slate-900 mb-1.5 bg-white">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="Logo" class="w-9 h-9 object-contain">
                <div>
                    <h1 class="text-xs font-black uppercase tracking-tight text-slate-950">Daffodil International University</h1>
                    <h2 class="text-[10px] font-bold text-slate-800">Department of Software Engineering (Dept of SWE) • Fall 2026 Routine</h2>
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
        <aside class="no-print w-full md:w-64 lg:w-72 bg-[#e0f2fe] border-r border-[#bae6fd] shadow-2xl flex flex-col shrink-0 text-[#0c4a6e] relative z-30">
            
            <!-- Sidebar Header: DIU Logo & University Branding -->
            <div class="p-5 pb-4 border-b border-[#bae6fd] bg-gradient-to-b from-[#e0f2fe] to-[#d0ebfd]">
                <a href="{{ route('routine.index') }}" class="flex items-center gap-3 group focus:outline-none">
                    <div class="w-12 h-12 shrink-0 rounded-2xl bg-gradient-to-tr from-blue-700 via-indigo-600 to-sky-400 p-1 shadow-md shadow-sky-600/30 group-hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="DIU SWE Logo" class="w-full h-full object-contain filter drop-shadow">
                    </div>
                    <div>
                        <span class="px-2 py-0.5 rounded text-[10px] font-extrabold uppercase tracking-wider bg-sky-200/80 text-[#0369a1] border border-sky-300">
                            Academic Portal
                        </span>
                        <h1 class="text-base lg:text-lg font-black tracking-tight text-[#0f2b5c] leading-tight group-hover:text-blue-700 transition">
                            Daffodil International University
                        </h1>
                        <h2 class="text-xs font-bold text-[#0284c7] tracking-wide flex items-center gap-1 mt-0.5">
                            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                            Dept of SWE
                            <span class="text-[#075985] font-normal text-[11px]">• DIU Software Engineering Department</span>
                        </h2>
                    </div>
                </a>
            </div>

            <!-- Mobile Menu Toggle Button (Visible on Small Screens) -->
            <div class="md:hidden px-4 py-2 bg-[#d7edfe] border-b border-[#bae6fd] flex items-center justify-between">
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
                <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => $viewMode]) }}" class="flex items-center justify-between px-3.5 py-3 rounded-xl text-xs sm:text-sm font-bold transition-all duration-150 {{ $activeTab === 'routine' ? 'bg-[#0f2b5c] text-white shadow-md shadow-[#0f2b5c]/30' : 'text-[#1e3a5f] hover:bg-[#cbe7fd] hover:text-[#0c4a6e]' }}">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $activeTab === 'routine' ? 'text-sky-300' : 'text-[#0284c7]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Weekly Routine Matrix</span>
                    </div>
                    @if($activeTab === 'routine')
                        <span class="w-2 h-2 rounded-full bg-sky-300"></span>
                    @endif
                </a>

                <!-- 2. Faculty Directory & Schedules -->
                <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $facultyQuery ?? 'MRA']) }}" class="flex items-center justify-between px-3.5 py-3 rounded-xl text-xs sm:text-sm font-bold transition-all duration-150 {{ $activeTab === 'faculty' ? 'bg-[#0f2b5c] text-white shadow-md shadow-[#0f2b5c]/30' : 'text-[#1e3a5f] hover:bg-[#cbe7fd] hover:text-[#0c4a6e]' }}">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $activeTab === 'faculty' ? 'text-sky-300' : 'text-[#0284c7]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span>Faculty Directory</span>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-extrabold {{ $activeTab === 'faculty' ? 'bg-sky-400 text-slate-950' : 'bg-sky-200 text-[#075985]' }}">
                        {{ count($facultyDirectory) }}
                    </span>
                </a>

                <!-- 3. Empty Room Tracker -->
                <a href="{{ route('routine.index', ['tab' => 'empty_rooms', 'empty_day' => $emptyDay, 'empty_slot' => $emptySlot]) }}" class="flex items-center justify-between px-3.5 py-3 rounded-xl text-xs sm:text-sm font-bold transition-all duration-150 {{ $activeTab === 'empty_rooms' ? 'bg-[#0f2b5c] text-white shadow-md shadow-[#0f2b5c]/30' : 'text-[#1e3a5f] hover:bg-[#cbe7fd] hover:text-[#0c4a6e]' }}">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $activeTab === 'empty_rooms' ? 'text-emerald-300' : 'text-emerald-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span>Empty Room Tracker</span>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-extrabold bg-emerald-500/20 text-emerald-800 border border-emerald-300">
                        {{ $roomAnalysis['available_count'] }} Free
                    </span>
                </a>

                <!-- 4. Custom Routine Builder -->
                <a href="{{ route('routine.index', ['tab' => 'custom']) }}" class="flex items-center justify-between px-3.5 py-3 rounded-xl text-xs sm:text-sm font-bold transition-all duration-150 {{ $activeTab === 'custom' ? 'bg-[#0f2b5c] text-white shadow-md shadow-[#0f2b5c]/30' : 'text-[#1e3a5f] hover:bg-[#cbe7fd] hover:text-[#0c4a6e]' }}">
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
                <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => $offeringBatch]) }}" class="flex items-center justify-between px-3.5 py-3 rounded-xl text-xs sm:text-sm font-bold transition-all duration-150 {{ $activeTab === 'offerings' ? 'bg-[#0f2b5c] text-white shadow-md shadow-[#0f2b5c]/30' : 'text-[#1e3a5f] hover:bg-[#cbe7fd] hover:text-[#0c4a6e]' }}">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $activeTab === 'offerings' ? 'text-sky-300' : 'text-[#0284c7]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <span>Course Syllabus</span>
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
                    <div class="space-y-1 mt-1">
                        <button type="button" onclick="exportRoutineImage('weeklyRoutineContainer', 'DIU_SWE_Batch_{{ $batch }}_{{ $section }}_Weekly_Routine')" class="w-full flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-bold text-[#1e3a5f] hover:bg-[#cbe7fd] hover:text-[#0c4a6e] transition">
                            <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>Download Routine Image (PNG)</span>
                        </button>
                        <a href="{{ route('routine.export.csv', ['batch' => $batch, 'section' => $section, 'major_track' => $track]) }}" class="w-full flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-bold text-[#1e3a5f] hover:bg-[#cbe7fd] hover:text-[#0c4a6e] transition">
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
        <div class="flex-1 flex flex-col min-w-0 bg-[#1a2942] text-slate-100">

            <!-- Top Campus & Quick Action Header -->
            <header class="no-print bg-[#1e304d] border-b border-[#2a4269] text-xs text-slate-300 py-3 px-4 sm:px-6 lg:px-8 shadow-md">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center gap-1.5 font-bold text-sky-300">
                            <svg class="w-3.5 h-3.5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Daffodil Smart City (DSC), Ashulia, Dhaka
                        </span>
                        <span class="hidden md:inline text-slate-500">|</span>
                        <span class="hidden md:inline text-slate-300">Faculty of Science & Information Technology (FSIT)</span>
                    </div>

                    <div class="flex items-center gap-4 text-xs font-semibold">
                        <span class="hidden sm:inline-flex items-center gap-1.5 text-emerald-400 bg-emerald-950/40 border border-emerald-700/50 px-2.5 py-1 rounded-full">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            Live Academic Routine
                        </span>
                        <span id="liveClock" class="font-mono text-sky-200"></span>
                    </div>
                </div>
            </header>

            <!-- Main Content Canvas -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto">

                {{-- ============================================================== --}}
                {{-- TAB 1: WEEKLY ROUTINE MATRIX (DEFAULT)                         --}}
                {{-- ============================================================== --}}
                @if($activeTab === 'routine')
                    <div class="space-y-6">

                        <!-- Filter & View Switch Toolbar Card (Light Navy Blue) -->
                        <div class="no-print bg-[#213352] border border-[#324970] rounded-2xl p-5 sm:p-6 shadow-xl relative overflow-hidden">
                            <div class="absolute -right-20 -top-20 w-72 h-72 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>
                            
                            <form method="GET" action="{{ route('routine.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end relative z-10">
                                <input type="hidden" name="tab" value="routine">
                                <input type="hidden" name="view_mode" value="{{ $viewMode }}">

                                <!-- Batch Selector -->
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                        Target Batch
                                    </label>
                                    <select name="batch" onchange="this.form.submit()" class="w-full bg-[#1a2842] border border-[#3a547d] rounded-xl px-3.5 py-2.5 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-sky-500 transition text-sm">
                                        @foreach($availableBatches as $b)
                                            <option value="{{ $b }}" {{ $batch == $b ? 'selected' : '' }}>
                                                Batch {{ $b }} @if($b == 41) (Major Tracks) @elseif($b == 40) (Graduating Seniors) @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Section Selector -->
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                                        Section
                                    </label>
                                    @php
                                        $maxSection = $batch === 40 ? 'F' : ($batch === 41 ? 'L' : (in_array($batch, [43, 44, 45]) ? 'N' : 'M'));
                                        $sectionsList = range('A', $maxSection);
                                    @endphp
                                    <select name="section" onchange="this.form.submit()" class="w-full bg-[#1a2842] border border-[#3a547d] rounded-xl px-3.5 py-2.5 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-sky-500 transition text-sm">
                                        @foreach($sectionsList as $sec)
                                            <option value="{{ $sec }}" {{ $section === $sec ? 'selected' : '' }}>
                                                Section {{ $sec }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Track Selector (Batch 41 specific) -->
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                        Specialization Track
                                    </label>
                                    <select name="major_track" onchange="this.form.submit()" class="w-full bg-[#1a2842] border border-[#3a547d] rounded-xl px-3.5 py-2.5 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-sky-500 transition text-sm {{ $batch !== 41 ? 'opacity-50' : '' }}">
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
                                    <button type="submit" class="flex-1 bg-sky-500 hover:bg-sky-400 text-slate-950 font-black px-4 py-2.5 rounded-xl transition shadow-lg shadow-sky-500/20 text-sm flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                        <span>Load Routine</span>
                                    </button>
                                    <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => $viewMode === 'grid' ? 'cards' : 'grid']) }}" title="Switch between Weekly Matrix Grid and Day Cards" class="p-2.5 rounded-xl bg-[#1a2842] hover:bg-[#25395c] text-slate-200 hover:text-white border border-[#3a547d] transition">
                                        @if($viewMode === 'grid')
                                            <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" title="Switch to Cards View"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                        @else
                                            <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" title="Switch to Weekly Timetable Grid"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        @endif
                                    </a>
                                </div>
                            </form>
                        </div>

                        <!-- Active Routine Metadata & Export Bar -->
                        <div class="flex flex-wrap items-center justify-between gap-4 bg-[#1e2e4b] border border-[#2d456b] rounded-2xl px-5 py-3.5 shadow-md">
                            <div class="flex flex-wrap items-center gap-2 sm:gap-3 text-xs sm:text-sm">
                                <span class="font-black text-white text-base">Batch {{ $batch }}-{{ $section }}</span>
                                @if($track)
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-indigo-500/20 text-indigo-300 border border-indigo-500/30">Track: {{ $track }}</span>
                                @endif
                                <span class="text-slate-500">•</span>
                                <span class="text-slate-300 font-medium">
                                    Total Assigned Classes: <strong class="text-sky-300">{{ $routines->flatten(1)->count() }} classes</strong>
                                </span>
                                <span class="text-slate-500">•</span>
                                <span class="text-slate-400 text-xs">
                                    View: <strong class="text-white">{{ $viewMode === 'grid' ? 'Weekly Timetable Grid' : 'Day-by-Day Cards' }}</strong>
                                </span>
                            </div>

                            <div class="no-print flex items-center gap-2">
                                <!-- Switch View Mode Pill -->
                                <div class="inline-flex rounded-xl bg-[#142034] p-1 border border-[#2d456b] text-xs font-bold">
                                    <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => 'grid']) }}" class="px-3 py-1.5 rounded-lg transition {{ $viewMode === 'grid' ? 'bg-sky-500 text-slate-950 font-black shadow' : 'text-slate-300 hover:text-white' }}">
                                        Timetable Grid
                                    </a>
                                    <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => 'cards']) }}" class="px-3 py-1.5 rounded-lg transition {{ $viewMode === 'cards' ? 'bg-sky-500 text-slate-950 font-black shadow' : 'text-slate-300 hover:text-white' }}">
                                        Day Cards
                                    </a>
                                </div>

                                <!-- Download Image (PNG) -->
                                <button type="button" onclick="exportRoutineImage('weeklyRoutineContainer', 'DIU_SWE_Batch_{{ $batch }}_{{ $section }}_Weekly_Routine')" title="Download full routine as high-resolution PNG image" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-gradient-to-r from-sky-600 to-blue-600 hover:from-sky-500 hover:to-blue-500 text-white text-xs font-bold shadow-md shadow-sky-600/30 transition">
                                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span>Download Image</span>
                                </button>

                                <!-- Download CSV -->
                                <a href="{{ route('routine.export.csv', ['batch' => $batch, 'section' => $section, 'major_track' => $track]) }}" title="Download well-formatted CSV spreadsheet" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-[#263b5f] hover:bg-[#304875] text-white text-xs font-bold border border-[#3b5585] transition shadow-sm">
                                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    <span>Download CSV</span>
                                </a>
                            </div>
                        </div>

                        {{-- VIEW OPTION A: WEEKLY TIMETABLE GRID MATRIX (ONE LANDSCAPE PAGE) --}}
                        @if($viewMode === 'grid')
                            <div id="weeklyRoutineContainer" class="overflow-hidden rounded-2xl border border-[#324970] bg-[#213352] shadow-2xl p-0">
                                
                                <!-- Integrated Header for Landscape Display and High-Res Image Export -->
                                <div class="px-4 py-2.5 bg-gradient-to-r from-[#142034] via-[#1a2d4a] to-[#142034] border-b border-[#2d4368] flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-sky-500/20 p-1 flex items-center justify-center border border-sky-400/30">
                                            <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="Logo" class="w-full h-full object-contain">
                                        </div>
                                        <div>
                                            <div class="text-xs sm:text-sm font-black text-white tracking-wide flex items-center gap-1.5">
                                                <span>Daffodil International University</span>
                                                <span class="text-sky-400">•</span>
                                                <span class="text-sky-300">Dept of SWE</span>
                                            </div>
                                            <div class="text-[10px] text-slate-300 font-semibold">
                                                Class Routine • Batch {{ $batch }} • Section {{ $section }} @if($track)({{ $track }})@endif • Fall 2026 Session
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right text-[10px] leading-tight">
                                        <div class="font-mono text-sky-300 font-bold">Effective: Sept 19, 2026</div>
                                        <div class="text-slate-400 text-[9px]">Ashulia Smart City (DSC)</div>
                                    </div>
                                </div>

                                <div class="overflow-x-auto">
                                    <table class="w-full border-collapse text-left text-xs print-table">
                                        <thead>
                                            <tr class="border-b border-[#2d4368] bg-[#162338] text-slate-300">
                                                <th class="p-2 sm:p-2.5 font-black uppercase tracking-wider text-sky-400 border-r border-[#2d4368] w-24 shrink-0 text-center">
                                                    Day / Time
                                                </th>
                                                @foreach($timeSlots as $slot)
                                                    <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#2d4368] last:border-r-0 min-w-[155px]">
                                                        <div class="text-white font-extrabold text-xs">{{ $slot['label'] }}</div>
                                                        <div class="text-[10px] font-normal text-sky-300">90 Mins Slot</div>
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-[#2a3e61]">
                                            @php
                                                $academicDays = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
                                            @endphp
                                            @foreach($academicDays as $day)
                                                <tr class="hover:bg-[#25395c]/60 transition-colors">
                                                    <!-- Day Header Cell -->
                                                    <td class="p-2 sm:p-2.5 font-black text-slate-100 bg-[#1c2b45] border-r border-[#2d4368] align-top w-24 shrink-0 text-center">
                                                        <div class="text-xs sm:text-sm text-sky-300 font-black tracking-wide">{{ $day }}</div>
                                                        @php
                                                            $dayCount = isset($routines[$day]) ? $routines[$day]->count() : 0;
                                                        @endphp
                                                        <div class="mt-0.5 text-[10px] font-medium text-slate-400">
                                                            {{ $dayCount }} {{ Str::plural('class', $dayCount) }}
                                                        </div>
                                                    </td>

                                                    <!-- Time Slots Columns -->
                                                    @foreach($timeSlots as $slot)
                                                        @php
                                                             $slotClasses = $weeklyGrid[$day][$slot['label']] ?? [];
                                                        @endphp
                                                        <td class="p-1.5 sm:p-2 border-r border-[#2a3e61] last:border-r-0 align-top min-w-[155px]">
                                                            @if(!empty($slotClasses))
                                                                <div class="space-y-1.5">
                                                                    @foreach($slotClasses as $cls)
                                                                        @php
                                                                            $faculty = App\Services\FacultyService::getFaculty($cls->teacher_initials);
                                                                            $isCustom = in_array($cls->id, $customSlotIds);
                                                                        @endphp
                                                                        <div class="group relative rounded-lg border border-[#3a547d] bg-[#1a2842] p-2 shadow-sm hover:border-sky-400 hover:shadow-sky-500/10 transition-all duration-150 print-card">
                                                                            <!-- Course Code & Track Badge -->
                                                                            <div class="flex items-center justify-between gap-1 mb-1">
                                                                                <span class="font-black text-xs text-sky-300 tracking-wide">
                                                                                    {{ $cls->course_id }}
                                                                                </span>
                                                                                @if($cls->major_track)
                                                                                    <span class="text-[9px] font-extrabold uppercase px-1 py-0.2 rounded bg-amber-400/20 text-amber-300 border border-amber-400/30">
                                                                                        {{ $cls->major_track }}
                                                                                    </span>
                                                                                @endif
                                                                            </div>

                                                                            <!-- Faculty Initials & Full Name -->
                                                                            <div class="mb-1">
                                                                                <div class="flex items-center gap-1 text-[11px] font-bold text-white">
                                                                                    <span class="px-1 py-0.2 rounded bg-indigo-500/20 text-indigo-300 font-mono text-[10px] border border-indigo-500/30">
                                                                                        {{ $cls->teacher_initials }}
                                                                                    </span>
                                                                                    <span class="truncate" title="{{ $faculty['name'] }} ({{ $faculty['designation'] }})">
                                                                                        {{ $faculty['name'] }}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="text-[9.5px] text-slate-400 truncate pl-0.5" title="{{ $faculty['designation'] }}">
                                                                                    {{ $faculty['designation'] }}
                                                                                </div>
                                                                            </div>

                                                                            <!-- Classroom & Building -->
                                                                            <div class="flex items-center justify-between text-[10px] pt-1 border-t border-[#2a3e61] text-slate-300">
                                                                                <span class="inline-flex items-center gap-1 font-semibold text-emerald-400">
                                                                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                                                                    {{ $cls->classroom_no }}
                                                                                </span>
                                                                                <span class="text-slate-400 text-[9px] font-mono">
                                                                                    {{ $cls->building }}
                                                                                </span>
                                                                            </div>

                                                                            <!-- Toggle Custom Slot Quick Action -->
                                                                            <div class="no-print mt-1.5 pt-1 flex items-center justify-between border-t border-[#2a3e61]">
                                                                                <form method="POST" action="{{ route('custom.toggle') }}">
                                                                                    @csrf
                                                                                    <input type="hidden" name="slot_id" value="{{ $cls->id }}">
                                                                                    <button type="submit" class="text-[9.5px] font-bold inline-flex items-center gap-1 transition {{ $isCustom ? 'text-rose-400 hover:text-rose-300' : 'text-slate-400 hover:text-sky-300' }}">
                                                                                        @if($isCustom)
                                                                                            <svg class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                                            <span>Remove</span>
                                                                                        @else
                                                                                            <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                                                                            <span>Add Custom</span>
                                                                                        @endif
                                                                                    </button>
                                                                                </form>
                                                                                <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $cls->teacher_initials]) }}" class="text-[9.5px] text-sky-400 hover:underline">
                                                                                    Faculty &rarr;
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <!-- Clean Free Slot indicator -->
                                                                <div class="h-16 rounded-lg border border-dashed border-[#2d4368] flex flex-col items-center justify-center text-center p-1 text-slate-500 select-none">
                                                                    <span class="text-[10px] font-semibold text-slate-400">Free Slot</span>
                                                                    <span class="text-[8.5px] text-slate-500 font-mono">No Class</span>
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
                            {{-- VIEW OPTION B: DAY-BY-DAY CARDS VIEW --}}
                            <div class="space-y-6">
                                @forelse($routines as $dayName => $slots)
                                    <section class="overflow-hidden rounded-2xl border border-[#324970] bg-[#213352] shadow-xl">
                                        <div class="border-b border-[#2d4368] bg-[#162338] px-5 py-3.5 flex items-center justify-between">
                                            <h3 class="text-base font-extrabold uppercase tracking-wider text-sky-400 flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                {{ $dayName }}
                                            </h3>
                                            <span class="text-xs font-bold text-slate-300 bg-[#1a2842] px-2.5 py-1 rounded-full border border-[#3a547d]">
                                                {{ $slots->count() }} Classes
                                            </span>
                                        </div>
                                        <div class="p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            @foreach($slots as $slot)
                                                @php
                                                    $fac = App\Services\FacultyService::getFaculty($slot->teacher_initials);
                                                    $isCustom = in_array($slot->id, $customSlotIds);
                                                @endphp
                                                <article class="rounded-xl border border-[#3a547d] bg-[#1a2842] p-4 hover:border-sky-400 transition-all duration-200">
                                                    <div class="flex items-center justify-between text-xs font-mono font-bold text-sky-300 pb-2 border-b border-[#2a3e61]">
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
                                                            <div class="flex items-center justify-between pt-2 border-t border-[#2a3e61] text-slate-300">
                                                                <span class="font-bold text-emerald-400 flex items-center gap-1">
                                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                                                    {{ $slot->classroom_no }}
                                                                </span>
                                                                <span class="text-xs font-mono text-slate-400">{{ $slot->building }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="no-print mt-3 pt-2.5 flex items-center justify-between border-t border-[#2a3e61]">
                                                        <form method="POST" action="{{ route('custom.toggle') }}">
                                                            @csrf
                                                            <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                                                            <button type="submit" class="text-xs font-bold transition {{ $isCustom ? 'text-rose-400' : 'text-slate-400 hover:text-sky-300' }}">
                                                                {{ $isCustom ? '✓ In Custom Routine' : '+ Add to Custom' }}
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
                                    <div class="rounded-2xl border border-dashed border-[#324970] bg-[#213352] p-12 text-center text-slate-400">
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
                        <div class="bg-[#213352] border border-[#324970] rounded-2xl p-6 shadow-xl relative overflow-hidden">
                            <div class="max-w-3xl">
                                <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-sky-500/10 text-sky-300 text-xs font-bold mb-3 border border-sky-500/20">
                                    Faculty Identification & Schedule Ledger
                                </div>
                                <h2 class="text-xl sm:text-2xl font-black text-white">Department Faculty Schedules & Directory</h2>
                                <p class="text-slate-300 text-xs sm:text-sm mt-1">
                                    Search any faculty member by their 2-4 letter initial (e.g., <strong class="text-sky-300">MRA, MAK, IM, AAA</strong>) or by full name to view their complete weekly routine.
                                </p>
                            </div>

                            <!-- Search Form -->
                            <form method="GET" action="{{ route('routine.index') }}" class="mt-6 flex flex-col sm:flex-row gap-3">
                                <input type="hidden" name="tab" value="faculty">
                                <div class="relative flex-1">
                                    <input type="text" name="faculty_initials" value="{{ $facultyQuery }}" placeholder="Enter initials (e.g. MRA) or full name (e.g. Ashek / Abdul Kader)..." class="w-full bg-[#1a2842] border border-[#3a547d] rounded-xl px-4 py-3 text-white font-semibold placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-sky-500 transition text-sm">
                                </div>
                                <button type="submit" class="bg-sky-500 hover:bg-sky-400 text-slate-950 font-black px-6 py-3 rounded-xl transition shadow-lg shadow-sky-500/25 text-sm flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    <span>Find Schedule</span>
                                </button>
                            </form>

                            <!-- Quick Click Faculty Chips -->
                            <div class="mt-5 pt-4 border-t border-[#2a3e61]">
                                <span class="text-xs font-bold uppercase tracking-wider text-slate-300 mr-2">Popular Teachers:</span>
                                <div class="inline-flex flex-wrap gap-1.5 mt-2">
                                    @foreach($popularFaculty->take(16) as $init)
                                        @php $f = App\Services\FacultyService::getFaculty($init); @endphp
                                        <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $init]) }}" class="px-2.5 py-1 rounded-lg text-xs font-bold transition border {{ $facultyQuery === $init ? 'bg-sky-500 text-slate-950 border-sky-400 font-black' : 'bg-[#1a2842] text-slate-200 hover:bg-[#25395c] border-[#3a547d]' }}" title="{{ $f['name'] }} ({{ $f['designation'] }})">
                                            {{ $init }} <span class="text-[10px] text-slate-400 font-normal hidden sm:inline">• {{ Str::limit($f['name'], 14) }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Searched Faculty Schedule Display -->
                        @if(!empty($facultyQuery))
                            <div class="bg-[#213352] border border-[#324970] rounded-2xl p-6 shadow-xl">
                                <!-- Faculty Profile Header -->
                                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-6 border-b border-[#2a3e61]">
                                    <div class="flex items-center gap-4">
                                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-sky-400 to-indigo-600 flex items-center justify-center text-slate-950 font-black text-xl font-mono shadow-lg shadow-sky-500/20">
                                            {{ $facultyQuery }}
                                        </div>
                                        <div>
                                            <h3 class="text-xl sm:text-2xl font-black text-white">{{ $facultyInfo['name'] ?? $facultyQuery }}</h3>
                                            <p class="text-sm font-semibold text-sky-300">{{ $facultyInfo['designation'] ?? 'Department Faculty' }}</p>
                                            <p class="text-xs text-slate-400 mt-0.5">Software Engineering Department • Daffodil International University</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-black text-white font-mono">{{ $facultyRoutines->flatten(1)->count() }}</div>
                                        <div class="text-xs font-bold text-slate-300 uppercase tracking-wider">Weekly Classes</div>
                                    </div>
                                </div>

                                <!-- Class Slots by Day -->
                                <div class="mt-6 space-y-6">
                                    @forelse($facultyRoutines as $day => $classes)
                                        <div class="rounded-xl border border-[#2a3e61] overflow-hidden">
                                            <div class="bg-[#162338] px-4 py-2.5 flex items-center justify-between border-b border-[#2a3e61]">
                                                <span class="font-extrabold text-sky-300 text-sm uppercase tracking-wider">{{ $day }}</span>
                                                <span class="text-xs font-mono text-slate-300">{{ $classes->count() }} slots</span>
                                            </div>
                                            <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                                @foreach($classes as $c)
                                                    <div class="p-3.5 rounded-xl border border-[#3a547d] bg-[#1a2842]">
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

                        <!-- Full Faculty Directory Table -->
                        <div class="bg-[#213352] border border-[#324970] rounded-2xl p-6 shadow-xl">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6">
                                <div>
                                    <h3 class="text-lg font-black text-white">Full Faculty Directory ({{ count($facultyDirectory) }} Members)</h3>
                                    <p class="text-xs text-slate-300">Official names and designations matching the Fall 2026 Academic Routine document.</p>
                                </div>
                                <input type="text" id="facultyFilterInput" onkeyup="filterFacultyTable()" placeholder="Quick filter table..." class="bg-[#1a2842] border border-[#3a547d] rounded-xl px-3.5 py-1.5 text-xs text-white placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-sky-500 w-full sm:w-64">
                            </div>

                            <div class="overflow-x-auto">
                                <table id="facultyTable" class="w-full text-left text-xs sm:text-sm divide-y divide-[#2a3e61]">
                                    <thead>
                                        <tr class="text-slate-300 font-bold text-xs uppercase tracking-wider bg-[#162338]">
                                            <th class="py-3 px-3">Initial</th>
                                            <th class="py-3 px-4">Faculty Member Full Name</th>
                                            <th class="py-3 px-4">Academic Designation</th>
                                            <th class="py-3 px-3 text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#2a3e61]/60 font-medium">
                                        @foreach($facultyDirectory as $init => $f)
                                            <tr class="hover:bg-[#25395c]/60 transition">
                                                <td class="py-3 px-3 font-mono font-bold text-sky-300">
                                                    <span class="px-2 py-1 rounded bg-[#1a2842] border border-[#3a547d]">{{ $init }}</span>
                                                </td>
                                                <td class="py-3 px-4 text-white font-bold">{{ $f['name'] }}</td>
                                                <td class="py-3 px-4 text-slate-300">{{ $f['designation'] }}</td>
                                                <td class="py-3 px-3 text-right">
                                                    <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $init]) }}" class="inline-flex items-center gap-1 text-xs font-bold text-sky-400 hover:text-sky-300">
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
                        <div class="bg-[#213352] border border-[#324970] rounded-2xl p-6 shadow-xl">
                            <div class="max-w-3xl">
                                <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-emerald-500/10 text-emerald-400 text-xs font-bold mb-3 border border-emerald-500/20">
                                    Physical Spaces & Lab Availability Engine
                                </div>
                                <h2 class="text-xl sm:text-2xl font-black text-white">SWE Dedicated Free Room Tracker</h2>
                                <p class="text-slate-300 text-xs sm:text-sm mt-1">
                                    Tracks the 18 dedicated Software Engineering Department rooms and laboratories in real time. Perfect for group projects, self-study, and lab sessions.
                                </p>
                            </div>

                            <form method="GET" action="{{ route('routine.index') }}" class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
                                <input type="hidden" name="tab" value="empty_rooms">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Academic Day</label>
                                    <select name="empty_day" onchange="this.form.submit()" class="w-full bg-[#1a2842] border border-[#3a547d] rounded-xl px-3.5 py-2.5 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-emerald-500 transition text-sm">
                                        @foreach($days as $d)
                                            <option value="{{ $d }}" {{ $emptyDay === $d ? 'selected' : '' }}>{{ $d }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Class Interval</label>
                                    <select name="empty_slot" onchange="this.form.submit()" class="w-full bg-[#1a2842] border border-[#3a547d] rounded-xl px-3.5 py-2.5 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-emerald-500 transition text-sm">
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
                            <div class="p-5 rounded-2xl bg-[#213352] border border-[#324970]">
                                <div class="text-xs font-bold text-slate-300 uppercase tracking-wider">Total Rooms</div>
                                <div class="text-2xl sm:text-3xl font-black text-white font-mono mt-1">{{ count($dedicatedRooms) }}</div>
                            </div>
                            <div class="p-5 rounded-2xl bg-emerald-950/40 border border-emerald-700/60">
                                <div class="text-xs font-bold text-emerald-400 uppercase tracking-wider">Available Free</div>
                                <div class="text-2xl sm:text-3xl font-black text-emerald-300 font-mono mt-1">{{ $roomAnalysis['available_count'] }}</div>
                            </div>
                            <div class="p-5 rounded-2xl bg-rose-950/40 border border-rose-700/60">
                                <div class="text-xs font-bold text-rose-400 uppercase tracking-wider">Occupied Rooms</div>
                                <div class="text-2xl sm:text-3xl font-black text-rose-300 font-mono mt-1">{{ $roomAnalysis['occupied_count'] }}</div>
                            </div>
                            <div class="p-5 rounded-2xl bg-[#213352] border border-[#324970]">
                                <div class="text-xs font-bold text-slate-300 uppercase tracking-wider">Availability</div>
                                <div class="text-2xl sm:text-3xl font-black text-sky-400 font-mono mt-1">
                                    {{ round(($roomAnalysis['available_count'] / count($dedicatedRooms)) * 100) }}%
                                </div>
                            </div>
                        </div>

                        <!-- Room Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($roomAnalysis['rooms'] as $rm)
                                @php $isFree = ($rm['status'] === 'Available / Empty'); @endphp
                                <div class="rounded-2xl border p-5 transition-all {{ $isFree ? 'bg-[#213352] border-emerald-500/40 hover:border-emerald-400' : 'bg-[#1e2e4b] border-rose-500/30' }}">
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="text-xl font-black text-white font-mono">{{ $rm['room_no'] }}</h4>
                                        <span class="px-2.5 py-1 rounded-full text-xs font-extrabold {{ $isFree ? 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/40' : 'bg-rose-500/20 text-rose-300 border border-rose-500/40' }}">
                                            {{ $isFree ? 'Available' : 'Occupied' }}
                                        </span>
                                    </div>
                                    <div class="text-xs text-slate-300">
                                        <span>Building: <strong class="text-white">{{ $rm['building'] }}</strong></span>
                                    </div>
                                    @if(!$isFree && isset($rm['occupied_by']))
                                        <div class="mt-3 pt-3 border-t border-[#2a3e61] text-xs space-y-1">
                                            <div class="text-slate-200 font-bold">Class: {{ $rm['occupied_by']['course_id'] }}</div>
                                            <div class="text-slate-300">
                                                Faculty: <strong class="text-white">{{ $rm['occupied_by']['teacher_name'] }} ({{ $rm['occupied_by']['teacher_initials'] }})</strong>
                                            </div>
                                            <div class="text-slate-400 text-[11px]">Batch {{ $rm['occupied_by']['batch'] }} • Sec {{ $rm['occupied_by']['section'] }}</div>
                                        </div>
                                    @else
                                        <div class="mt-3 pt-3 border-t border-[#2a3e61] text-[11px] text-emerald-400 font-medium">
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
                        <div class="bg-[#213352] border border-[#324970] rounded-2xl p-6 shadow-xl">
                            <div class="max-w-3xl">
                                <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-violet-500/10 text-violet-300 text-xs font-bold mb-3 border border-violet-500/20">
                                    Cross-Batch & Retake Course Organizer
                                </div>
                                <h2 class="text-xl sm:text-2xl font-black text-white">Customizable Routine Builder</h2>
                                <p class="text-slate-300 text-xs sm:text-sm mt-1">
                                    Lookup courses across all batches, select your registered sections, and compile an individualized weekly timetable with zero time clashes.
                                </p>
                            </div>

                            <!-- Search Course Input -->
                            <form method="GET" action="{{ route('routine.index') }}" class="mt-6 flex flex-col sm:flex-row gap-3">
                                <input type="hidden" name="tab" value="custom">
                                <div class="relative flex-1">
                                    <input type="text" name="course_search" value="{{ $courseSearch }}" placeholder="Enter Course Code (e.g. SWE112, SE223, MAT101)..." class="w-full bg-[#1a2842] border border-[#3a547d] rounded-xl px-4 py-3 text-white font-semibold uppercase placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-violet-500 transition text-sm">
                                </div>
                                <button type="submit" class="bg-violet-600 hover:bg-violet-500 text-white font-bold px-6 py-3 rounded-xl transition shadow-lg shadow-violet-600/25 text-sm flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    <span>Search Slots</span>
                                </button>
                            </form>
                        </div>

                        <!-- Custom Timetable Result Summary -->
                        <div class="bg-[#213352] border border-[#324970] rounded-2xl p-6 shadow-xl">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-5 border-b border-[#2a3e61]">
                                <div>
                                    <h3 class="text-lg font-black text-white">Your Selected Custom Routine</h3>
                                    <p class="text-xs text-slate-300">Total Selected Slots: <strong class="text-sky-300">{{ count($customSlotIds) }}</strong> classes.</p>
                                </div>
                                @if(count($customSlotIds) > 0)
                                    <div class="flex items-center gap-2">
                                        <button type="button" onclick="exportRoutineImage('customRoutineContainer', 'DIU_SWE_Custom_Student_Routine')" class="px-3.5 py-2 rounded-xl bg-gradient-to-r from-sky-600 to-blue-600 hover:from-sky-500 hover:to-blue-500 text-xs font-bold text-white shadow transition flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
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

                            @if(count($customSlotIds) > 0)
                                <!-- Custom Weekly Grid -->
                                <div id="customRoutineContainer" class="mt-6 overflow-x-auto rounded-xl border border-[#324970] bg-[#213352]">
                                    <table class="w-full text-left text-xs sm:text-sm print-table">
                                        <thead>
                                            <tr class="bg-[#162338] text-slate-300 border-b border-[#2d4368]">
                                                <th class="p-3 font-bold border-r border-[#2d4368] w-28">Day</th>
                                                @foreach($timeSlots as $slot)
                                                    <th class="p-3 text-center border-r border-[#2d4368] last:border-r-0 min-w-[150px]">
                                                        {{ $slot['label'] }}
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-[#2a3e61]">
                                            @foreach(['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'] as $d)
                                                <tr>
                                                    <td class="p-3 font-bold text-sky-400 bg-[#1c2b45] border-r border-[#2d4368] align-top">{{ $d }}</td>
                                                    @foreach($timeSlots as $slot)
                                                        @php $classes = $customWeeklyGrid[$d][$slot['label']] ?? []; @endphp
                                                        <td class="p-2 border-r border-[#2a3e61] last:border-r-0 align-top">
                                                            @foreach($classes as $c)
                                                                @php $fac = App\Services\FacultyService::getFaculty($c->teacher_initials); @endphp
                                                                <div class="p-2.5 rounded-lg bg-[#1a2842] border border-[#3a547d] mb-1.5 shadow">
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
                                <div class="p-10 text-center text-slate-400">
                                    No custom slots selected yet. Search a course above to add slots to your custom schedule!
                                </div>
                            @endif
                        </div>

                        <!-- Course Search Available Slots -->
                        @if(!empty($courseSearch))
                            <div class="bg-[#213352] border border-[#324970] rounded-2xl p-6 shadow-xl">
                                <h4 class="text-base font-black text-white mb-4">
                                    Available Class Slots for <span class="text-sky-300">"{{ $courseSearch }}"</span>
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach($courseSearchResults->flatten(1) as $slot)
                                        @php
                                            $isSel = in_array($slot->id, $customSlotIds);
                                            $fac = App\Services\FacultyService::getFaculty($slot->teacher_initials);
                                        @endphp
                                        <div class="rounded-xl border p-4 {{ $isSel ? 'bg-violet-950/40 border-violet-500/60' : 'bg-[#1a2842] border-[#3a547d]' }}">
                                            <div class="flex items-center justify-between text-xs font-mono font-bold text-sky-300">
                                                <span>Batch {{ $slot->batch }} • Sec {{ $slot->section }}</span>
                                                <span>{{ $slot->day_of_week }}</span>
                                            </div>
                                            <h5 class="text-lg font-black text-white mt-1.5">{{ $slot->course_id }}</h5>
                                            <p class="text-xs text-slate-300 mt-1">Faculty: <strong class="text-white">{{ $fac['name'] }} ({{ $slot->teacher_initials }})</strong></p>
                                            <p class="text-xs text-slate-400">Time: {{ date('h:i A', strtotime($slot->start_time)) }} - {{ date('h:i A', strtotime($slot->end_time)) }}</p>
                                            <p class="text-xs text-emerald-400">Room: {{ $slot->classroom_no }} ({{ $slot->building }})</p>
                                            
                                            <form method="POST" action="{{ route('custom.toggle') }}" class="mt-3 pt-2.5 border-t border-[#2a3e61]">
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
                        <div class="bg-[#213352] border border-[#324970] rounded-2xl p-6 shadow-xl">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                <div>
                                    <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-sky-500/10 text-sky-300 text-xs font-bold mb-3 border border-sky-500/20">
                                        Department Academic Curriculum
                                    </div>
                                    <h2 class="text-xl sm:text-2xl font-black text-white">Course Offerings & Syllabus Matrix</h2>
                                    <p class="text-slate-300 text-xs sm:text-sm mt-1">Official course syllabus load and credit breakdown for each engineering cohort.</p>
                                </div>
                                <form method="GET" action="{{ route('routine.index') }}" class="flex items-center gap-2">
                                    <input type="hidden" name="tab" value="offerings">
                                    <select name="offering_batch" onchange="this.form.submit()" class="bg-[#1a2842] border border-[#3a547d] rounded-xl px-3.5 py-2 text-white font-semibold text-xs sm:text-sm">
                                        <option value="0">All Batches</option>
                                        @foreach($availableBatches as $b)
                                            <option value="{{ $b }}" {{ $offeringBatch == $b ? 'selected' : '' }}>Batch {{ $b }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>

                            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                @forelse($offerings as $course)
                                    <div class="rounded-xl border border-[#3a547d] bg-[#1a2842] p-4 hover:border-sky-400 transition">
                                        <div class="flex items-center justify-between text-xs mb-2">
                                            <span class="px-2 py-0.5 rounded font-mono font-bold bg-sky-500/20 text-sky-300 border border-sky-500/30">
                                                Batch {{ $course->batch }}
                                            </span>
                                            <span class="font-bold text-slate-300">{{ $course->credits }} Credits</span>
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
                                    <div class="p-8 text-center text-slate-400 col-span-3">No course offerings found.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endif

            </main>

            <!-- Light Navy Blue Footer -->
            <footer class="no-print mt-auto border-t border-[#2a4269] bg-[#162338] text-slate-400 py-6 px-4 sm:px-6 lg:px-8 text-xs">
                <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="Logo" class="w-8 h-8 object-contain">
                        <div>
                            <p class="font-extrabold text-xs text-white">Daffodil International University</p>
                            <p class="text-slate-400 text-[11px]">Department of Software Engineering (Dept of SWE)</p>
                        </div>
                    </div>
                    <div class="text-center md:text-right space-y-0.5 text-[11px]">
                        <p class="text-slate-300 font-semibold">Fall 2026 Academic Session • Weekly Routine Organizer</p>
                        <p class="text-slate-400">Daffodil Smart City (DSC), Birulia, Savar, Dhaka-1216, Bangladesh</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

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

        // Download Routine as High-Resolution Landscape Image (PNG)
        function exportRoutineImage(containerId, filename) {
            const container = document.getElementById(containerId);
            if (!container) {
                alert('Routine table container was not found on this page.');
                return;
            }

            showToast('Generating high-resolution routine image...', 'info');

            if (typeof html2canvas === 'function') {
                html2canvas(container, {
                    scale: 2,
                    useCORS: true,
                    allowTaint: true,
                    backgroundColor: '#1a2942',
                    logging: false,
                    windowWidth: container.scrollWidth || 1400
                }).then(function(canvas) {
                    const link = document.createElement('a');
                    link.download = (filename || 'DIU_SWE_Weekly_Routine') + '.png';
                    link.href = canvas.toDataURL('image/png');
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    showToast('Routine image downloaded successfully (PNG)!', 'success');
                }).catch(function(err) {
                    console.error('Failed to capture routine image:', err);
                    showToast('Error generating routine image. Please try again.', 'error');
                });
            } else {
                alert('Image export engine is loading. Please try again in a few seconds.');
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
                toast.className = 'fixed bottom-5 right-5 z-50 px-4 py-3 rounded-xl shadow-2xl text-xs sm:text-sm font-bold flex items-center gap-2.5 bg-sky-600 text-white border border-sky-400/30 transition-all duration-300 transform translate-y-0 opacity-100';
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
