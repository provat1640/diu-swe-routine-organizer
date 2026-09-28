<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWE Department Routine Matrix</title>
    <script src="https://tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen font-sans">
    <div class="container mx-auto px-4 py-8">
        <header class="mb-8 border-b border-slate-700 pb-4">
            <h1 class="text-3xl font-bold text-sky-400">DIU Software Engineering Department</h1>
            <p class="text-slate-400">Academic Schedule Interface — Fall 2026 Matrix</p>
        </header>

        <form method="GET" action="/" class="bg-slate-800 p-6 rounded-lg shadow-xl mb-8 border border-slate-700 flex flex-wrap gap-4 items-end">
            <div>
                <label class="block text-sm text-slate-400 font-semibold mb-2">Target Batch</label>
                <select name="batch" class="bg-slate-700 border border-slate-600 rounded px-4 py-2 text-white focus:outline-none focus:border-sky-500">
                    <?php foreach([40,41,42,43,44,45,46,47,48,49] as $b): ?>
                        <option value="<?= $b ?>" <?= $batch == $b ? 'selected' : '' ?>>Batch <?= $b ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-sm text-slate-400 font-semibold mb-2">Section Code</label>
                <input type="text" name="section" value="<?= htmlspecialchars($section) ?>" class="w-24 bg-slate-700 border border-slate-600 rounded px-4 py-2 text-white focus:outline-none focus:border-sky-500 text-center uppercase" maxLength="2" required   />
            </div>
            <div>
                <label class="block text-sm text-slate-400 font-semibold mb-2">Specialized Track (Batch 41 Only)</label>
                <select name="major_track" class="bg-slate-700 border border-slate-600 rounded px-4 py-2 text-white focus:outline-none focus:border-sky-500">
                    <option value="">Core / All Tracks</option>
                    <option value="SE" <?= $track == 'SE' ? 'selected' : '' ?>>SE (Software Engineering)</option>
                    <option value="DS" <?= $track == 'DS' ? 'selected' : '' ?>>DS (Data Science)</option>
                    <option value="RE" <?= $track == 'RE' ? 'selected' : '' ?>>RE (Robotics & Embedded Systems)</option>
                    <option value="ST" <?= $track == 'ST' ? 'selected' : '' ?>>ST (Software Testing)</option>
                    <option value="CS" <?= $track == 'CS' ? 'selected' : '' ?>>CS (Cyber Security)</option>
                </select>
            </div>
            <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white font-bold px-6 py-2 rounded transition-colors shadow">Filter Grid</button>
        </form>

        <main class="grid gap-6">
            <?php if(count($routines) > 0): ?>
                <?php foreach($routines as $day => $slots): ?>
                    <div class="bg-slate-800 rounded-lg border border-slate-700 overflow-hidden shadow-lg">
                        <div class="bg-sky-950 text-sky-400 px-6 py-3 font-bold text-lg border-b border-slate-700 uppercase tracking-wider"><?= htmlspecialchars($day) ?></div>
                        <div class="p-4 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                            <?php foreach($slots as $slot): ?>
                                <div class="bg-slate-700 p-4 rounded-md border border-slate-600 relative hover:border-sky-500 transition-colors">
                                    <div class="text-xs text-sky-300 font-bold tracking-widest mb-1"><?= date('h:i A', strtotime($slot->start_time)) ?> - <?= date('h:i A', strtotime($slot->end_time)) ?></div>
                                    <h3 class="text-lg font-bold text-white mb-2"><?= htmlspecialchars($slot->course_id) ?></h3>
                                    <div class="flex justify-between text-sm text-slate-300">
                                        <span>Faculty: <strong class="text-white"><?= htmlspecialchars($slot->teacher_initials) ?></strong></span>
                                        <span>Room: <strong class="text-white"><?= htmlspecialchars($slot->classroom_no) ?> (<?= htmlspecialchars($slot->building) ?>)</strong></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="bg-slate-800 border border-slate-700 rounded-lg p-12 text-center text-slate-400">
                    No active routine slots recorded matching Batch <?= htmlspecialchars($batch) ?>-<?= htmlspecialchars($section) ?>.
                </div>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>