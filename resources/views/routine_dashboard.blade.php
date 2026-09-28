<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIU SWE Routine Organizer • Fall 2026 Matrix</title>
    <!-- Tailwind CSS with Dark Mode via CDN & Vite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        slate: {
                            850: '#151f32',
                            950: '#070d18',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; color: black !important; }
            .print-card { border: 1px solid #ccc !important; background: white !important; color: black !important; page-break-inside: avoid; }
            .print-header { color: #0f172a !important; }
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen antialiased flex flex-col selection:bg-indigo-500 selection:text-white">

    <!-- Top Banner & Notification Bar -->
    @if(session('status'))
        <div class="no-print bg-emerald-600/90 text-white text-sm font-semibold px-4 py-2.5 text-center shadow-md flex items-center justify-center gap-2">
            <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    <!-- Main Navigation Header -->
    <header class="border-b border-slate-800 bg-slate-900/80 backdrop-blur sticky top-0 z-40 no-print">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-indigo-600 via-sky-500 to-emerald-400 p-0.5 shadow-lg shadow-indigo-500/20 flex items-center justify-center">
                        <div class="w-full h-full bg-slate-900 rounded-[10px] flex items-center justify-center">
                            <span class="font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-indigo-300 text-lg">SWE</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-bold uppercase tracking-widest text-indigo-400 bg-indigo-950/80 border border-indigo-800/60 px-2 py-0.5 rounded">DIU Ashulia Campus</span>
                            <span class="text-xs font-semibold uppercase tracking-wider text-emerald-400 bg-emerald-950/80 border border-emerald-800/60 px-2 py-0.5 rounded flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Fall 2026 Matrix
                            </span>
                        </div>
                        <h1 class="text-xl font-bold tracking-tight text-white flex items-center gap-2">
                            DIU Software Engineering Department
                        </h1>
                    </div>
                </div>

                <!-- Action Toolbar -->
                <div class="flex items-center gap-3">
                    <button onclick="window.print()" class="hidden md:flex items-center gap-2 bg-slate-800 hover:bg-slate-700 text-slate-200 text-sm font-semibold px-3.5 py-2 rounded-lg border border-slate-700 transition shadow-sm">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        Print Routine
                    </button>
                    <a href="/api/v1/android-sync?feature=meta" target="_blank" class="hidden sm:flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-semibold px-3.5 py-2 rounded-lg transition shadow-md shadow-indigo-600/30">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.523 15.3414c-.5511 0-.9993-.4486-.9993-.9997s.4482-.9993.9993-.9993c.551 0 .9993.4482.9993.9993.0001.5511-.4482.9997-.9993.9997m-11.046 0c-.5511 0-.9993-.4486-.9993-.9997s.4482-.9993.9993-.9993c.5511 0 .9993.4482.9993.9993 0 .5511-.4482.9997-.9993.9997m11.4045-6.02l1.9973-3.4592a.416.416 0 00-.1521-.5676.416.416 0 00-.5676.1521l-2.0223 3.503C15.5902 8.4116 13.8533 8.125 12 8.125s-3.5902.2866-5.1368.8247L4.8409 5.4467a.4161.4161 0 00-.5677-.1521.4157.4157 0 00-.1521.5676l1.9973 3.4592C2.6889 11.1867.3432 14.6589 0 18.7844h24c-.3432-4.1255-2.6889-7.5977-6.1185-9.463"></path></svg>
                        Android API
                    </a>
                </div>
            </div>

            <!-- Tab Navigation Bar -->
            <nav class="flex space-x-1 sm:space-x-4 border-t border-slate-800/80 overflow-x-auto py-2.5 scrollbar-none">
                <a href="/?tab=routine&batch={{ $batch }}&section={{ $section }}&major_track={{ $track }}" class="px-3.5 py-2 rounded-lg text-sm font-bold transition flex items-center gap-2 whitespace-nowrap {{ $activeTab === 'routine' ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Batch Routine Grid
                </a>
                <a href="/?tab=faculty&faculty_initials={{ $facultyQuery ?? 'DSM' }}" class="px-3.5 py-2 rounded-lg text-sm font-bold transition flex items-center gap-2 whitespace-nowrap {{ $activeTab === 'faculty' ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Faculty Schedules
                </a>
                <a href="/?tab=empty_rooms&empty_day={{ $emptyDay }}&empty_slot={{ $emptySlot }}" class="px-3.5 py-2 rounded-lg text-sm font-bold transition flex items-center gap-2 whitespace-nowrap {{ $activeTab === 'empty_rooms' ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    Empty Room Tracker
                    <span class="bg-emerald-500/20 text-emerald-300 text-xs px-2 py-0.5 rounded-full border border-emerald-500/30 font-mono">{{ $roomAnalysis['available_count'] }} Free</span>
                </a>
                <a href="/?tab=custom" class="px-3.5 py-2 rounded-lg text-sm font-bold transition flex items-center gap-2 whitespace-nowrap {{ $activeTab === 'custom' ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Custom Routine Builder
                    @if(count($customSlotIds) > 0)
                        <span class="bg-sky-500 text-white text-xs px-2 py-0.5 rounded-full font-mono">{{ count($customSlotIds) }}</span>
                    @endif
                </a>
                <a href="/?tab=offerings&offering_batch={{ $offeringBatch }}" class="px-3.5 py-2 rounded-lg text-sm font-bold transition flex items-center gap-2 whitespace-nowrap {{ $activeTab === 'offerings' ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Course Offerings
                </a>
                <a href="/?tab=api_console" class="px-3.5 py-2 rounded-lg text-sm font-bold transition flex items-center gap-2 whitespace-nowrap {{ $activeTab === 'api_console' ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    Android API Console
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Container Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-1 w-full">

        {{-- ============================================================== --}}
        {{-- TAB 1: BATCH ROUTINE GRID                                      --}}
        {{-- ============================================================== --}}
        @if($activeTab === 'routine')
            <div class="space-y-8">
                <!-- Filter Form Card -->
                <div class="no-print bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl relative overflow-hidden">
                    <div class="absolute -right-16 -top-16 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>
                    <form method="GET" action="/" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end relative z-10">
                        <input type="hidden" name="tab" value="routine">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Target Batch</label>
                            <select name="batch" class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                @foreach($availableBatches as $b)
                                    <option value="{{ $b }}" {{ $batch == $b ? 'selected' : '' }}>
                                        Batch {{ $b }} @if($b == 41) (Specialized Majors) @elseif($b == 40) (Graduating Seniors) @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Section Code</label>
                            <input type="text" name="section" value="{{ $section }}" placeholder="e.g. A, B, A1" class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-white font-mono uppercase text-center font-bold focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" required />
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">
                                Major Track @if($batch == 41) <span class="text-indigo-400 font-bold">(Batch 41 Specialization)</span> @endif
                            </label>
                            <select name="major_track" class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                <option value="">Core / All Tracks</option>
                                <option value="SE" {{ $track == 'SE' ? 'selected' : '' }}>SE • Software Engineering</option>
                                <option value="DS" {{ $track == 'DS' ? 'selected' : '' }}>DS • Data Science</option>
                                <option value="CS" {{ $track == 'CS' ? 'selected' : '' }}>CS • Cyber Security</option>
                                <option value="ST" {{ $track == 'ST' ? 'selected' : '' }}>ST • Software Testing</option>
                                <option value="RE" {{ $track == 'RE' ? 'selected' : '' }}>RE • Robotics & Embedded</option>
                            </select>
                        </div>

                        <div class="flex gap-2">
                            <button type="submit" class="flex-1 bg-gradient-to-r from-indigo-600 to-sky-600 hover:from-indigo-500 hover:to-sky-500 text-white font-bold py-3 px-6 rounded-xl transition shadow-lg shadow-indigo-600/30 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                                Filter Grid
                            </button>
                            <a href="/?tab=routine&batch={{ $batch }}&section=A" class="bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold px-4 py-3 rounded-xl border border-slate-700 transition flex items-center justify-center" title="Reset to Section A">
                                ↺
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Grid Information Header -->
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between pb-4 border-b border-slate-800 gap-2">
                    <div>
                        <h2 class="text-2xl font-black text-white flex items-center gap-3">
                            <span>Batch {{ $batch }}</span>
                            <span class="text-slate-600">•</span>
                            <span class="text-indigo-400 font-mono">Section {{ $section }}</span>
                            @if($track)
                                <span class="bg-indigo-950 text-indigo-300 border border-indigo-700/60 text-xs px-2.5 py-1 rounded-full uppercase tracking-wider font-mono">{{ $track }} Track</span>
                            @endif
                        </h2>
                        <p class="text-sm text-slate-400 mt-0.5">Chronologically organized by academic days using database-agnostic sorting.</p>
                    </div>
                    <div class="flex items-center gap-2 text-xs font-mono text-slate-400 bg-slate-900 border border-slate-800 px-3 py-1.5 rounded-lg">
                        <span>Total Classes: <strong class="text-white">{{ $routines->flatten(1)->count() }}</strong></span>
                    </div>
                </div>

                <!-- Day-Wise Grid Cards -->
                @if($routines->count() > 0)
                    <div class="space-y-6">
                        @foreach($routines as $day => $slots)
                            <div class="print-card bg-slate-900/90 border border-slate-800/80 rounded-2xl overflow-hidden shadow-xl">
                                <!-- Day Header Banner -->
                                <div class="bg-gradient-to-r from-slate-900 via-slate-850 to-slate-900 border-b border-slate-800 px-6 py-3.5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-3 h-3 rounded-full bg-indigo-500 shadow-sm shadow-indigo-500/50"></div>
                                        <h3 class="text-lg font-bold text-white tracking-wide uppercase font-mono print-header">{{ $day }}</h3>
                                    </div>
                                    <span class="text-xs font-mono text-slate-400 bg-slate-800/80 border border-slate-700/60 px-2.5 py-1 rounded-full">
                                        {{ count($slots) }} {{ count($slots) === 1 ? 'Slot' : 'Slots' }}
                                    </span>
                                </div>

                                <!-- Class Slot Grid -->
                                <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                                    @foreach($slots as $slot)
                                        @php
                                            $isCustom = in_array($slot->id, $customSlotIds);
                                            $buildingColor = match($slot->building) {
                                                'Annex' => 'bg-purple-950/70 text-purple-300 border-purple-800/50',
                                                'AB3' => 'bg-blue-950/70 text-blue-300 border-blue-800/50',
                                                'AB4' => 'bg-cyan-950/70 text-cyan-300 border-cyan-800/50',
                                                'Main' => 'bg-emerald-950/70 text-emerald-300 border-emerald-800/50',
                                                'ONLINE' => 'bg-amber-950/70 text-amber-300 border-amber-800/50',
                                                default => 'bg-slate-800 text-slate-300 border-slate-700',
                                            };
                                        @endphp
                                        <div class="group relative bg-slate-850 hover:bg-slate-800 border {{ $isCustom ? 'border-indigo-500 shadow-lg shadow-indigo-500/10' : 'border-slate-800 hover:border-slate-700' }} rounded-xl p-5 transition flex flex-col justify-between">
                                            <div>
                                                <!-- Time Badge & Section -->
                                                <div class="flex items-center justify-between gap-2 mb-3">
                                                    <span class="inline-flex items-center gap-1.5 text-xs font-mono font-bold text-sky-400 bg-sky-950/80 border border-sky-800/60 px-2.5 py-1 rounded-md">
                                                        <svg class="w-3.5 h-3.5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        {{ date('h:i A', strtotime($slot->start_time)) }} - {{ date('h:i A', strtotime($slot->end_time)) }}
                                                    </span>
                                                    <span class="text-xs font-mono font-bold text-slate-400 bg-slate-800 border border-slate-700 px-2 py-0.5 rounded">
                                                        Sec {{ $slot->section }}
                                                    </span>
                                                </div>

                                                <!-- Course Title & Code -->
                                                <div class="flex items-baseline justify-between mb-2">
                                                    <h4 class="text-xl font-extrabold text-white tracking-tight group-hover:text-indigo-400 transition font-mono">
                                                        {{ $slot->course_id }}
                                                    </h4>
                                                    @if($slot->major_track)
                                                        <span class="text-xs font-bold text-indigo-300 bg-indigo-950 border border-indigo-800 px-2 py-0.5 rounded uppercase font-mono">
                                                            {{ $slot->major_track }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="mt-4 pt-3 border-t border-slate-800/80 flex items-center justify-between text-xs text-slate-300">
                                                <!-- Faculty Initial (Clickable) -->
                                                <a href="/?tab=faculty&faculty_initials={{ $slot->teacher_initials }}" class="hover:text-sky-400 transition flex items-center gap-1.5" title="View {{ $slot->teacher_initials }} schedule">
                                                    <span class="w-6 h-6 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center font-bold text-[10px] text-indigo-400 font-mono">
                                                        {{ substr($slot->teacher_initials, 0, 2) }}
                                                    </span>
                                                    <span class="font-bold text-white font-mono">{{ $slot->teacher_initials }}</span>
                                                </a>

                                                <!-- Room & Building -->
                                                <span class="inline-flex items-center gap-1 font-semibold px-2 py-0.5 rounded border {{ $buildingColor }}">
                                                    Room {{ $slot->classroom_no }}
                                                </span>
                                            </div>

                                            <!-- Toggle Custom Routine Button -->
                                            <form method="POST" action="/custom-routine/toggle" class="no-print mt-3 pt-2">
                                                @csrf
                                                <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                                                <button type="submit" class="w-full text-xs font-semibold py-1.5 rounded-lg border transition flex items-center justify-center gap-1.5 {{ $isCustom ? 'bg-indigo-950 text-indigo-300 border-indigo-700 hover:bg-rose-950 hover:text-rose-300 hover:border-rose-700' : 'bg-slate-800 text-slate-400 border-slate-700 hover:text-white hover:bg-slate-700' }}">
                                                    @if($isCustom)
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                        In Custom Routine (Click to Remove)
                                                    @else
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                                        Add to Custom Routine
                                                    @endif
                                                </button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-16 text-center space-y-3">
                        <div class="w-16 h-16 mx-auto rounded-full bg-slate-800 flex items-center justify-center text-slate-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold text-white">No Routine Slots Found</h4>
                        <p class="text-sm text-slate-400 max-w-md mx-auto">
                            No active classes recorded matching Batch <span class="text-white font-bold">{{ $batch }}</span>, Section <span class="text-white font-bold">{{ $section }}</span>.
                            Try selecting another section or checking the Course Offerings tab.
                        </p>
                    </div>
                @endif
            </div>

        {{-- ============================================================== --}}
        {{-- TAB 2: FACULTY SCHEDULES SEARCH                                --}}
        {{-- ============================================================== --}}
        @elseif($activeTab === 'faculty')
            <div class="space-y-8">
                <!-- Faculty Search Form -->
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl">
                    <form method="GET" action="/" class="space-y-4">
                        <input type="hidden" name="tab" value="faculty">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <div class="flex-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                                <input type="text" name="faculty_initials" value="{{ $facultyQuery }}" placeholder="Enter Teacher Initial (e.g. DSM, MZH, FAJ, MRA, ST)..." class="w-full bg-slate-800 border border-slate-700 rounded-xl pl-12 pr-4 py-3.5 text-white font-mono uppercase font-bold focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" required />
                            </div>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold px-8 py-3.5 rounded-xl transition shadow-lg shadow-indigo-600/30 flex items-center justify-center gap-2">
                                Search Faculty
                            </button>
                        </div>

                        <!-- Popular Faculty Quick Pills -->
                        <div class="pt-2">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-2">Quick Lookup Popular Faculty:</span>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach($popularFaculty as $initial)
                                    <a href="/?tab=faculty&faculty_initials={{ $initial }}" class="text-xs font-mono font-bold px-2.5 py-1 rounded-lg border transition {{ $facultyQuery === $initial ? 'bg-indigo-600 text-white border-indigo-500' : 'bg-slate-800 text-slate-300 border-slate-700 hover:bg-slate-700 hover:text-white' }}">
                                        {{ $initial }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Search Results -->
                @if($facultyQuery)
                    <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                        <div>
                            <h2 class="text-2xl font-black text-white flex items-center gap-3">
                                <span>Faculty Schedule:</span>
                                <span class="text-sky-400 font-mono">{{ $facultyQuery }}</span>
                            </h2>
                            <p class="text-sm text-slate-400">All teaching commitments organized chronologically by academic days.</p>
                        </div>
                        <span class="text-xs font-mono text-slate-400 bg-slate-900 border border-slate-800 px-3 py-1.5 rounded-lg">
                            Total Classes: <strong class="text-white">{{ $facultyRoutines->flatten(1)->count() }}</strong>
                        </span>
                    </div>

                    @if($facultyRoutines->count() > 0)
                        <div class="space-y-6">
                            @foreach($facultyRoutines as $day => $slots)
                                <div class="print-card bg-slate-900/90 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
                                    <div class="bg-gradient-to-r from-slate-900 via-slate-850 to-slate-900 border-b border-slate-800 px-6 py-3 flex items-center justify-between">
                                        <h3 class="text-md font-bold text-white tracking-wide uppercase font-mono">{{ $day }}</h3>
                                        <span class="text-xs font-mono text-slate-400 bg-slate-800 px-2 py-0.5 rounded">{{ count($slots) }} classes</span>
                                    </div>
                                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        @foreach($slots as $slot)
                                            <div class="bg-slate-850 border border-slate-800 rounded-xl p-4 flex flex-col justify-between">
                                                <div>
                                                    <div class="flex items-center justify-between mb-2">
                                                        <span class="text-xs font-mono font-bold text-sky-400 bg-sky-950 border border-sky-800/60 px-2 py-0.5 rounded">
                                                            {{ date('h:i A', strtotime($slot->start_time)) }} - {{ date('h:i A', strtotime($slot->end_time)) }}
                                                        </span>
                                                        <span class="text-xs font-mono text-indigo-300 bg-indigo-950 border border-indigo-800 px-2 py-0.5 rounded">
                                                            Batch {{ $slot->batch }}-{{ $slot->section }}
                                                        </span>
                                                    </div>
                                                    <h4 class="text-lg font-bold text-white font-mono mb-1">{{ $slot->course_id }}</h4>
                                                </div>
                                                <div class="mt-3 pt-2 border-t border-slate-800 flex items-center justify-between text-xs text-slate-400">
                                                    <span>Room: <strong class="text-white">{{ $slot->classroom_no }}</strong></span>
                                                    <span class="bg-slate-800 border border-slate-700 text-slate-300 px-2 py-0.5 rounded">{{ $slot->building }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-12 text-center text-slate-400">
                            No classes found for faculty initials <strong class="text-white">{{ $facultyQuery }}</strong>.
                        </div>
                    @endif
                @endif
            </div>

        {{-- ============================================================== --}}
        {{-- TAB 3: DEDICATED SWE EMPTY ROOM TRACKER                         --}}
        {{-- ============================================================== --}}
        @elseif($activeTab === 'empty_rooms')
            <div class="space-y-8">
                <!-- Filter Card -->
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl">
                    <form method="GET" action="/" class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
                        <input type="hidden" name="tab" value="empty_rooms">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Day of Week</label>
                            <select name="empty_day" class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                @foreach($days as $d)
                                    <option value="{{ $d }}" {{ $emptyDay == $d ? 'selected' : '' }}>{{ $d }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Time Slot Block</label>
                            <select name="empty_slot" class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-indigo-500 font-mono">
                                @foreach($timeSlots as $slot)
                                    @php $val = "{$slot['start']} - {$slot['end']}"; @endphp
                                    <option value="{{ $val }}" {{ $emptySlot == $val ? 'selected' : '' }}>
                                        {{ $slot['label'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 px-6 rounded-xl transition shadow-lg shadow-emerald-600/30 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Check Availability
                        </button>
                    </form>
                </div>

                <!-- Status Banner -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-slate-900 border border-slate-800 rounded-xl p-5 flex items-center justify-between">
                        <div>
                            <span class="text-xs uppercase font-bold text-slate-500 tracking-wider">Dedicated SWE Rooms</span>
                            <h3 class="text-2xl font-black text-white font-mono mt-1">{{ count($dedicatedRooms) }} Spaces</h3>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center text-indigo-400 font-bold">18</div>
                    </div>

                    <div class="bg-emerald-950/40 border border-emerald-800/60 rounded-xl p-5 flex items-center justify-between">
                        <div>
                            <span class="text-xs uppercase font-bold text-emerald-400 tracking-wider">Available / Empty</span>
                            <h3 class="text-2xl font-black text-emerald-300 font-mono mt-1">{{ $roomAnalysis['available_count'] }} Free</h3>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-emerald-900/60 border border-emerald-700/60 flex items-center justify-center text-emerald-300 font-bold">✓</div>
                    </div>

                    <div class="bg-rose-950/30 border border-rose-900/60 rounded-xl p-5 flex items-center justify-between">
                        <div>
                            <span class="text-xs uppercase font-bold text-rose-400 tracking-wider">Currently Occupied</span>
                            <h3 class="text-2xl font-black text-rose-300 font-mono mt-1">{{ $roomAnalysis['occupied_count'] }} Busy</h3>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-rose-900/40 border border-rose-800/60 flex items-center justify-center text-rose-300 font-bold">✕</div>
                    </div>
                </div>

                <!-- Room Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($roomAnalysis['rooms'] as $room)
                        @php $isFree = ($room['status'] === 'Available / Empty'); @endphp
                        <div class="border rounded-2xl p-5 transition {{ $isFree ? 'bg-slate-900/90 border-emerald-700/50 hover:border-emerald-500' : 'bg-slate-900/60 border-slate-800 hover:border-slate-700' }}">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="text-xl font-black text-white font-mono">{{ $room['room_no'] }}</h4>
                                <span class="text-xs font-mono font-bold px-2 py-0.5 rounded border {{ $isFree ? 'bg-emerald-950 text-emerald-300 border-emerald-700/80' : 'bg-rose-950 text-rose-300 border-rose-800/80' }}">
                                    {{ $room['status'] }}
                                </span>
                            </div>

                            <div class="text-xs text-slate-400 space-y-1">
                                <div class="flex items-center justify-between">
                                    <span>Building:</span>
                                    <strong class="text-white font-mono">{{ $room['building'] }}</strong>
                                </div>

                                @if($isFree)
                                    <div class="mt-3 pt-3 border-t border-slate-800/80 text-emerald-400/90 font-medium flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        Free for student study groups & meetings
                                    </div>
                                @else
                                    <div class="mt-3 pt-3 border-t border-slate-800/80 space-y-1 text-slate-300">
                                        <div class="flex justify-between">
                                            <span>Running Course:</span>
                                            <strong class="text-white font-mono">{{ $room['occupied_by']['course_id'] }}</strong>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Faculty Initials:</span>
                                            <strong class="text-sky-300 font-mono">{{ $room['occupied_by']['teacher_initials'] }}</strong>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Batch / Section:</span>
                                            <strong class="text-indigo-300 font-mono">B{{ $room['occupied_by']['batch'] }}-{{ $room['occupied_by']['section'] }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        {{-- ============================================================== --}}
        {{-- TAB 4: CUSTOM ROUTINE BUILDER (IRREGULAR / RETAKE STUDENTS)    --}}
        {{-- ============================================================== --}}
        @elseif($activeTab === 'custom')
            <div class="space-y-8">
                <!-- Custom Builder Introduction -->
                <div class="bg-gradient-to-r from-slate-900 via-indigo-950/40 to-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="bg-indigo-950 text-indigo-300 border border-indigo-700 text-xs px-2.5 py-0.5 rounded font-bold uppercase tracking-wider font-mono">Irregular Student Engine</span>
                        </div>
                        <h2 class="text-2xl font-black text-white">Customizable Academic Routine Builder</h2>
                        <p class="text-sm text-slate-400 mt-1 max-w-2xl">
                            Search any course code across all semesters (e.g. <span class="font-mono text-sky-400">SE121, MAT101, SE214, DS421</span>), pick your desired batch/section combinations, and compile your personal weekly calendar.
                        </p>
                    </div>

                    @if(count($customSlotIds) > 0)
                        <div class="flex items-center gap-3">
                            <form method="POST" action="/custom-routine/clear" onsubmit="return confirm('Reset all selected custom slots?')">
                                @csrf
                                <button type="submit" class="bg-rose-950 hover:bg-rose-900 text-rose-300 border border-rose-800 font-bold px-4 py-2.5 rounded-xl text-xs transition">
                                    Reset Selection
                                </button>
                            </form>
                            <button onclick="window.print()" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold px-4 py-2.5 rounded-xl text-xs transition shadow-md shadow-indigo-600/30">
                                Print My Routine
                            </button>
                        </div>
                    @endif
                </div>

                <!-- Search Input Form -->
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl">
                    <form method="GET" action="/" class="flex flex-col sm:flex-row gap-3">
                        <input type="hidden" name="tab" value="custom">
                        <div class="flex-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input type="text" name="course_search" value="{{ $courseSearch }}" placeholder="Search Course Code (e.g. SE121, SE214, PHY101, DS421, STA101)..." class="w-full bg-slate-800 border border-slate-700 rounded-xl pl-12 pr-4 py-3.5 text-white font-mono uppercase font-bold focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" required />
                        </div>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold px-8 py-3.5 rounded-xl transition shadow-lg shadow-indigo-600/30 flex items-center justify-center gap-2">
                            Scan System Matrix
                        </button>
                    </form>
                </div>

                <!-- Course Search Results -->
                @if($courseSearch)
                    <div class="space-y-4">
                        <div class="flex items-center justify-between pb-2 border-b border-slate-800">
                            <h3 class="text-xl font-bold text-white flex items-center gap-2">
                                <span>Active Section Options for:</span>
                                <span class="text-sky-400 font-mono">{{ $courseSearch }}</span>
                            </h3>
                            <span class="text-xs font-mono text-slate-400 bg-slate-900 border border-slate-800 px-3 py-1 rounded">
                                {{ $courseSearchResults->flatten(1)->count() }} Sections Available
                            </span>
                        </div>

                        @if($courseSearchResults->count() > 0)
                            <div class="space-y-4">
                                @foreach($courseSearchResults as $day => $slots)
                                    <div class="bg-slate-900 border border-slate-800 rounded-xl p-4">
                                        <h4 class="text-sm font-bold text-slate-400 uppercase tracking-wider font-mono mb-3">{{ $day }}</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                            @foreach($slots as $slot)
                                                @php $isAdded = in_array($slot->id, $customSlotIds); @endphp
                                                <div class="border rounded-xl p-4 flex flex-col justify-between transition {{ $isAdded ? 'bg-indigo-950/30 border-indigo-500' : 'bg-slate-850 border-slate-800' }}">
                                                    <div>
                                                        <div class="flex items-center justify-between text-xs font-mono mb-2">
                                                            <span class="font-bold text-indigo-400">Batch {{ $slot->batch }}-{{ $slot->section }}</span>
                                                            <span class="text-sky-300">{{ date('h:i A', strtotime($slot->start_time)) }} - {{ date('h:i A', strtotime($slot->end_time)) }}</span>
                                                        </div>
                                                        <div class="flex items-baseline justify-between">
                                                            <span class="font-bold text-white font-mono text-md">{{ $slot->course_id }}</span>
                                                            <span class="text-xs text-slate-400 font-mono">Faculty: <strong class="text-white">{{ $slot->teacher_initials }}</strong></span>
                                                        </div>
                                                        <div class="text-xs text-slate-400 mt-1 font-mono">
                                                            Room: <strong class="text-slate-200">{{ $slot->classroom_no }} ({{ $slot->building }})</strong>
                                                        </div>
                                                    </div>

                                                    <form method="POST" action="/custom-routine/toggle" class="mt-3 pt-2 border-t border-slate-800">
                                                        @csrf
                                                        <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                                                        <button type="submit" class="w-full text-xs font-bold py-1.5 rounded-lg border transition {{ $isAdded ? 'bg-rose-950 text-rose-300 border-rose-800 hover:bg-rose-900' : 'bg-indigo-600 hover:bg-indigo-500 text-white border-transparent' }}">
                                                            {{ $isAdded ? 'Remove from My Routine' : 'Add to My Routine' }}
                                                        </button>
                                                    </form>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="bg-slate-900 border border-slate-800 rounded-xl p-10 text-center text-slate-400">
                                No active routine sections found for code <strong class="text-white">{{ $courseSearch }}</strong>.
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Compiled Custom Calendar Grid View -->
                <div class="pt-6 border-t border-slate-800">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-black text-white flex items-center gap-2">
                                <span>My Custom Weekly Calendar</span>
                                <span class="bg-indigo-950 text-indigo-300 border border-indigo-700 text-xs px-2.5 py-0.5 rounded-full font-mono">{{ count($customSlotIds) }} Selected</span>
                            </h3>
                            <p class="text-sm text-slate-400 mt-0.5">Your personal cross-batch schedule compiled into a unified view.</p>
                        </div>
                    </div>

                    @if($customRoutines->count() > 0)
                        <div class="space-y-6">
                            @foreach($customRoutines as $day => $slots)
                                <div class="print-card bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
                                    <div class="bg-slate-850 border-b border-slate-800 px-6 py-3.5 flex items-center justify-between">
                                        <h4 class="text-md font-bold text-white font-mono uppercase">{{ $day }}</h4>
                                        <span class="text-xs font-mono text-slate-400 bg-slate-800 px-2.5 py-1 rounded-full">{{ count($slots) }} classes</span>
                                    </div>
                                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        @foreach($slots as $slot)
                                            <div class="bg-slate-850 border border-slate-800 rounded-xl p-4 flex flex-col justify-between">
                                                <div>
                                                    <div class="flex items-center justify-between mb-2">
                                                        <span class="text-xs font-mono font-bold text-sky-400 bg-sky-950 border border-sky-800 px-2 py-0.5 rounded">
                                                            {{ date('h:i A', strtotime($slot->start_time)) }} - {{ date('h:i A', strtotime($slot->end_time)) }}
                                                        </span>
                                                        <span class="text-xs font-mono text-indigo-300 bg-indigo-950 border border-indigo-800 px-2 py-0.5 rounded">
                                                            Batch {{ $slot->batch }}-{{ $slot->section }}
                                                        </span>
                                                    </div>
                                                    <h5 class="text-lg font-bold text-white font-mono mb-1">{{ $slot->course_id }}</h5>
                                                    <div class="text-xs text-slate-300 flex justify-between font-mono">
                                                        <span>Faculty: <strong class="text-white">{{ $slot->teacher_initials }}</strong></span>
                                                        <span>Room: <strong class="text-white">{{ $slot->classroom_no }}</strong></span>
                                                    </div>
                                                </div>

                                                <form method="POST" action="/custom-routine/toggle" class="no-print mt-3 pt-2 border-t border-slate-800">
                                                    @csrf
                                                    <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                                                    <button type="submit" class="w-full text-xs font-semibold py-1 rounded bg-rose-950/80 hover:bg-rose-900 text-rose-300 border border-rose-800/80 transition">
                                                        Remove
                                                    </button>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-12 text-center text-slate-400 space-y-3">
                            <p>You haven't selected any classes yet. Use the search bar above to look up courses or click <strong>"Add to Custom Routine"</strong> on any card in the Batch Routine tab.</p>
                        </div>
                    @endif
                </div>
            </div>

        {{-- ============================================================== --}}
        {{-- TAB 5: COURSE OFFERINGS DIRECTORY                              --}}
        {{-- ============================================================== --}}
        @elseif($activeTab === 'offerings')
            <div class="space-y-8">
                <!-- Offerings Filter -->
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl">
                    <form method="GET" action="/" class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
                        <input type="hidden" name="tab" value="offerings">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Filter by Batch</label>
                            <select name="offering_batch" class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="0">All Batches (40 - 49)</option>
                                @foreach($availableBatches as $b)
                                    <option value="{{ $b }}" {{ $offeringBatch == $b ? 'selected' : '' }}>
                                        Batch {{ $b }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Major Track</label>
                            <select name="offering_track" class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-white font-semibold focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="">All Tracks</option>
                                <option value="SE" {{ $offeringTrack == 'SE' ? 'selected' : '' }}>SE • Software Engineering</option>
                                <option value="DS" {{ $offeringTrack == 'DS' ? 'selected' : '' }}>DS • Data Science</option>
                                <option value="CS" {{ $offeringTrack == 'CS' ? 'selected' : '' }}>CS • Cyber Security</option>
                                <option value="ST" {{ $offeringTrack == 'ST' ? 'selected' : '' }}>ST • Software Testing</option>
                                <option value="RE" {{ $offeringTrack == 'RE' ? 'selected' : '' }}>RE • Robotics & Embedded</option>
                            </select>
                        </div>

                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 px-6 rounded-xl transition shadow-lg shadow-indigo-600/30">
                            Filter Syllabus
                        </button>
                    </form>
                </div>

                <!-- Course Table -->
                <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
                    <div class="p-6 border-b border-slate-800 flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-white">Department Syllabus & Course Offerings</h3>
                            <p class="text-sm text-slate-400">Complete curriculum matrix for Fall 2026 semester.</p>
                        </div>
                        <span class="text-xs font-mono text-slate-400 bg-slate-800 px-3 py-1.5 rounded-lg">
                            Total Courses: <strong class="text-white">{{ $offerings->count() }}</strong>
                        </span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-slate-300">
                            <thead class="bg-slate-850 text-xs uppercase font-mono text-slate-400 border-b border-slate-800">
                                <tr>
                                    <th class="px-6 py-4">Batch</th>
                                    <th class="px-6 py-4">Course Code</th>
                                    <th class="px-6 py-4">Course Title</th>
                                    <th class="px-6 py-4">Track</th>
                                    <th class="px-6 py-4">Credits</th>
                                    <th class="px-6 py-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800">
                                @forelse($offerings as $offering)
                                    <tr class="hover:bg-slate-850/60 transition">
                                        <td class="px-6 py-4 font-mono font-bold text-white">Batch {{ $offering->batch }}</td>
                                        <td class="px-6 py-4 font-mono font-bold text-sky-400">{{ $offering->course_code }}</td>
                                        <td class="px-6 py-4 text-white font-medium">{{ $offering->course_name }}</td>
                                        <td class="px-6 py-4">
                                            @if($offering->major_track)
                                                <span class="text-xs font-bold text-indigo-300 bg-indigo-950 border border-indigo-800 px-2 py-0.5 rounded uppercase font-mono">
                                                    {{ $offering->major_track }}
                                                </span>
                                            @else
                                                <span class="text-xs text-slate-500 font-mono">Core</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 font-mono text-emerald-400 font-bold">{{ $offering->credits }} Cr</td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="/?tab=custom&course_search={{ $offering->course_code }}" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 hover:underline">
                                                Find in Routine →
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                            No course offerings matching filter criteria.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        {{-- ============================================================== --}}
        {{-- TAB 6: ANDROID REST API CONSOLE                                --}}
        {{-- ============================================================== --}}
        @elseif($activeTab === 'api_console')
            <div class="space-y-8">
                <!-- API Console Header -->
                <div class="bg-gradient-to-r from-slate-900 via-indigo-950/50 to-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="bg-emerald-950 text-emerald-300 border border-emerald-800 text-xs px-2.5 py-0.5 rounded font-bold uppercase tracking-wider font-mono">API v1 Spec Verified</span>
                    </div>
                    <h2 class="text-2xl font-black text-white">Mobile Synchronization Unified JSON Interface</h2>
                    <p class="text-sm text-slate-400 mt-1 max-w-3xl">
                        High-performance REST API endpoints specifically constructed to feed native Android clients and mobile offline database synchronizers. Complies with the schema signature required in <code class="text-indigo-300 bg-slate-800 px-1.5 py-0.5 rounded font-mono">AI_INSTRUCTIONS.md</code>.
                    </p>
                </div>

                <!-- Live Test Endpoints -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Endpoint 1 -->
                    <div class="bg-slate-900 border border-slate-800 rounded-xl p-5 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold font-mono text-emerald-400 bg-emerald-950 border border-emerald-800 px-2 py-0.5 rounded">GET / POST</span>
                            <span class="text-xs text-slate-500 font-mono">feature: routine</span>
                        </div>
                        <h4 class="text-md font-bold text-white">Student Batch Routine</h4>
                        <p class="text-xs text-slate-400">Fetch active weekly schedule filtered by batch and section.</p>
                        <div class="bg-slate-950 p-2.5 rounded-lg border border-slate-800 font-mono text-xs text-sky-300 truncate">
                            /api/v1/android-sync?batch=49&section=A
                        </div>
                        <a href="/api/v1/android-sync?batch=49&section=A" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-indigo-400 hover:text-indigo-300">
                            Execute Query in New Tab ↗
                        </a>
                    </div>

                    <!-- Endpoint 2 -->
                    <div class="bg-slate-900 border border-slate-800 rounded-xl p-5 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold font-mono text-emerald-400 bg-emerald-950 border border-emerald-800 px-2 py-0.5 rounded">GET / POST</span>
                            <span class="text-xs text-slate-500 font-mono">feature: faculty_search</span>
                        </div>
                        <h4 class="text-md font-bold text-white">Faculty Schedule Lookup</h4>
                        <p class="text-xs text-slate-400">Query all assignments for a specific teacher initial.</p>
                        <div class="bg-slate-950 p-2.5 rounded-lg border border-slate-800 font-mono text-xs text-sky-300 truncate">
                            /api/v1/android-sync?teacher=DSM
                        </div>
                        <a href="/api/v1/android-sync?teacher=DSM" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-indigo-400 hover:text-indigo-300">
                            Execute Query in New Tab ↗
                        </a>
                    </div>

                    <!-- Endpoint 3 -->
                    <div class="bg-slate-900 border border-slate-800 rounded-xl p-5 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold font-mono text-emerald-400 bg-emerald-950 border border-emerald-800 px-2 py-0.5 rounded">GET / POST</span>
                            <span class="text-xs text-slate-500 font-mono">feature: empty_rooms</span>
                        </div>
                        <h4 class="text-md font-bold text-white">Empty Room Checklist</h4>
                        <p class="text-xs text-slate-400">Check availability for the 18 dedicated SWE rooms at any day & slot.</p>
                        <div class="bg-slate-950 p-2.5 rounded-lg border border-slate-800 font-mono text-xs text-sky-300 truncate">
                            /api/v1/android-sync?feature=empty_rooms&day_of_week=Sunday&time_slot=10:00:00 - 11:30:00
                        </div>
                        <a href="/api/v1/android-sync?feature=empty_rooms&day_of_week=Sunday&time_slot=10:00:00%20-%2011:30:00" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-indigo-400 hover:text-indigo-300">
                            Execute Query in New Tab ↗
                        </a>
                    </div>

                    <!-- Endpoint 4 -->
                    <div class="bg-slate-900 border border-slate-800 rounded-xl p-5 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold font-mono text-emerald-400 bg-emerald-950 border border-emerald-800 px-2 py-0.5 rounded">GET / POST</span>
                            <span class="text-xs text-slate-500 font-mono">feature: meta</span>
                        </div>
                        <h4 class="text-md font-bold text-white">System Metadata Dictionary</h4>
                        <p class="text-xs text-slate-400">Extract all batches, time slots, days, and room lists for offline cache.</p>
                        <div class="bg-slate-950 p-2.5 rounded-lg border border-slate-800 font-mono text-xs text-sky-300 truncate">
                            /api/v1/android-sync?feature=meta
                        </div>
                        <a href="/api/v1/android-sync?feature=meta" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-indigo-400 hover:text-indigo-300">
                            Execute Query in New Tab ↗
                        </a>
                    </div>
                </div>

                <!-- JSON Response Preview -->
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-3">
                    <div class="flex items-center justify-between">
                        <h4 class="text-md font-bold text-white font-mono">Sample Response Envelope Signature</h4>
                        <span class="text-xs text-slate-400 font-mono">application/json</span>
                    </div>
                    <pre class="bg-slate-950 p-4 rounded-xl border border-slate-800 text-xs font-mono text-emerald-400 overflow-x-auto">
{
  "status": "success",
  "client": "Android Integration Layer",
  "feature": "empty_rooms",
  "meta": {
    "day_of_week": "Sunday",
    "start_time": "10:00:00",
    "end_time": "11:30:00",
    "total_dedicated": 18,
    "available_count": 14,
    "occupied_count": 4
  },
  "payload": [
    {
      "room_no": "Annex-108",
      "building": "Annex",
      "status": "Available / Empty",
      "occupied_by": null
    }
  ]
}
                    </pre>
                </div>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800 bg-slate-900/60 py-6 mt-12 no-print">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-slate-500 space-y-1">
            <p>Daffodil International University • Department of Software Engineering (SWE)</p>
            <p>Fall 2026 Academic Routine Engine & Resource Manager • Powered by Laravel 13 & MySQL Localhost</p>
        </div>
    </footer>

</body>
</html>