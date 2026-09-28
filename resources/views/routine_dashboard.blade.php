<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIU SWE Routine Organizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-950 text-slate-100">
<div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <header class="mb-8 flex flex-col gap-3 border-b border-slate-800 pb-6 sm:flex-row sm:items-end sm:justify-between">
        <div><p class="text-sm font-semibold uppercase tracking-[.25em] text-sky-400">DIU · SWE</p><h1 class="mt-2 text-3xl font-black">Routine command center</h1><p class="mt-2 text-slate-400">Fall 2026 academic schedule and availability matrix.</p></div>
        <div class="rounded-full border border-emerald-500/30 bg-emerald-500/10 px-4 py-2 text-sm text-emerald-300">Live academic ledger</div>
    </header>

    <form method="GET" action="{{ route('routine.dashboard') }}" class="mb-8 grid gap-4 rounded-2xl border border-slate-800 bg-slate-900 p-5 shadow-2xl md:grid-cols-4">
        <label class="text-sm text-slate-400">Batch<select name="batch" class="mt-2 w-full rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 text-slate-100">@foreach([40,41,42,43,44,45,46,47,48,49] as $option)<option value="{{ $option }}" @selected($batch == $option)>Batch {{ $option }}</option>@endforeach</select></label>
        <label class="text-sm text-slate-400">Section<select name="section" class="mt-2 w-full rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 text-slate-100">@foreach(range('A', $batch === 40 ? 'F' : ($batch === 41 ? 'L' : (in_array($batch, [43,44,45]) ? 'N' : 'M'))) as $option)<option value="{{ $option }}" @selected($section === $option)>{{ $option }}</option>@endforeach</select></label>
        <label class="text-sm text-slate-400">Track<select name="major_track" class="mt-2 w-full rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 text-slate-100"><option value="">All / core</option>@foreach(['SE'=>'Software Engineering','DS'=>'Data Science','RE'=>'Robotics & Embedded','ST'=>'Software Testing','CS'=>'Cyber Security'] as $key => $label)<option value="{{ $key }}" @selected($track === $key)>{{ $key }} · {{ $label }}</option>@endforeach</select></label>
        <button class="self-end rounded-lg bg-sky-500 px-4 py-2 font-bold text-slate-950 transition hover:bg-sky-400">Load routine</button>
    </form>

    <div class="mb-8 grid gap-6 lg:grid-cols-3">
        <section class="rounded-2xl border border-slate-800 bg-slate-900 p-5"><h2 class="text-lg font-bold">Faculty search</h2><form action="{{ route('routine.faculty') }}" method="GET" class="mt-4 flex gap-2"><input name="initial" placeholder="MRA" class="min-w-0 flex-1 rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 uppercase" required><button class="rounded-lg bg-indigo-500 px-3 font-semibold hover:bg-indigo-400">Search</button></form></section>
        <section class="rounded-2xl border border-slate-800 bg-slate-900 p-5"><h2 class="text-lg font-bold">Irregular student</h2><form action="{{ route('routine.custom') }}" method="GET" class="mt-4 flex gap-2"><input name="course_codes[]" placeholder="SE223" class="min-w-0 flex-1 rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 uppercase" required><button class="rounded-lg bg-violet-500 px-3 font-semibold hover:bg-violet-400">Build</button></form></section>
        <section class="rounded-2xl border border-slate-800 bg-slate-900 p-5"><h2 class="text-lg font-bold">Empty SWE rooms</h2><form action="{{ route('routine.empty-rooms') }}" method="GET" class="mt-4 grid grid-cols-2 gap-2"><select name="day" class="rounded-lg border border-slate-700 bg-slate-800 px-2 py-2">@foreach(['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday'] as $day)<option>{{ $day }}</option>@endforeach</select><input type="time" step="1" name="time" value="10:00:00" class="rounded-lg border border-slate-700 bg-slate-800 px-2 py-2"><button class="col-span-2 rounded-lg bg-emerald-500 px-3 py-2 font-semibold text-slate-950 hover:bg-emerald-400">Find rooms</button></form></section>
    </div>

    <main class="space-y-6">@forelse($routines as $day => $slots)<section class="overflow-hidden rounded-2xl border border-slate-800 bg-slate-900"><div class="border-b border-slate-800 bg-slate-900/80 px-5 py-4 text-lg font-black uppercase tracking-widest text-sky-300">{{ $day }}</div><div class="grid gap-4 p-5 md:grid-cols-2 lg:grid-cols-3">@foreach($slots as $slot)<article class="rounded-xl border border-slate-700 bg-slate-800 p-4 transition hover:-translate-y-0.5 hover:border-sky-500"><div class="text-xs font-bold tracking-wider text-sky-300">{{ date('h:i A', strtotime($slot->start_time)) }} — {{ date('h:i A', strtotime($slot->end_time)) }}</div><h3 class="mt-2 text-xl font-black">{{ $slot->course_id }}</h3><div class="mt-3 space-y-1 text-sm text-slate-300"><p>Faculty: <strong class="text-white">{{ $slot->teacher_initials }}</strong></p><p>Room: <strong class="text-white">{{ $slot->classroom_no }} · {{ $slot->building }}</strong></p>@if($slot->major_track)<p>Track: <strong class="text-white">{{ $slot->major_track }}</strong></p>@endif</div></article>@endforeach</div></section>@empty<div class="rounded-2xl border border-dashed border-slate-700 bg-slate-900 p-14 text-center text-slate-400">No routine slots found for Batch {{ $batch }}-{{ $section }}.</div>@endforelse</main>
</div>
</body>
</html>
