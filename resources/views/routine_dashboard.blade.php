<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIU SWE Routine Organizer | Daffodil International University SWE Routine Live</title>
    <meta name="description" content="DIU SWE Routine Organizer: The official-grade interactive class routine for Daffodil International University (DIU) Software Engineering students and faculty. Access batch timetables (40-49), find empty classrooms, search teachers, and build custom schedules.">
    <meta name="keywords" content="diu swe routine, diu routine, swe routine diu, diu swe routine organizer, daffodil international university routine, daffodil software engineering routine, diu routine live, diusweroutine.live, diu timetable, diu class routine">
    <meta name="author" content="Hafizur Rahman Provat (Department of Software Engineering, Daffodil International University)">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://diusweroutine.live/">

    <!-- Open Graph / Facebook / LinkedIn -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://diusweroutine.live/">
    <meta property="og:title" content="DIU SWE Routine Organizer | Daffodil International University SWE Routine Live">
    <meta property="og:description" content="Official-grade interactive DIU SWE class routine organizer, batch timetables (Batch 40-49), faculty schedules, and empty classroom finder live at diusweroutine.live. Developed by Hafizur Rahman Provat.">
    <meta property="og:image" content="{{ asset('images/diu-swe-logo.png') }}">
    <meta property="og:site_name" content="DIU SWE Routine Organizer">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://diusweroutine.live/">
    <meta name="twitter:title" content="DIU SWE Routine Organizer">
    <meta name="twitter:description" content="Interactive class routine, timetable organizer, and empty room finder for DIU SWE students and faculty. Developed by Hafizur Rahman Provat.">
    <meta name="twitter:image" content="{{ asset('images/diu-swe-logo.png') }}">

    <!-- Schema.org JSON-LD Structured Data for Google #1 Search Ranking -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@graph": [
        {
          "@@type": "WebSite",
          "@@id": "https://diusweroutine.live/#website",
          "url": "https://diusweroutine.live/",
          "name": "DIU SWE Routine Organizer",
          "description": "Interactive class routine organizer and timetable portal for DIU Software Engineering students.",
          "inLanguage": "en-US",
          "publisher": {
            "@@type": "Person",
            "name": "Hafizur Rahman Provat",
            "url": "https://hafizurrahmanprovat.tech",
            "sameAs": [
              "https://github.com/provat1640",
              "https://hafizurrahmanprovat.tech"
            ],
            "jobTitle": "Lead Software Engineer",
            "affiliation": {
              "@@type": "EducationalOrganization",
              "name": "Department of Software Engineering, Daffodil International University"
            }
          }
        },
        {
          "@@type": "WebApplication",
          "@@id": "https://diusweroutine.live/#webapp",
          "url": "https://diusweroutine.live/",
          "name": "DIU SWE Routine Organizer",
          "applicationCategory": "EducationalApplication",
          "operatingSystem": "All",
          "browserRequirements": "Requires JavaScript. Requires HTML5.",
          "author": {
            "@@type": "Person",
            "name": "Hafizur Rahman Provat",
            "url": "https://hafizurrahmanprovat.tech",
            "sameAs": [
              "https://github.com/provat1640",
              "https://hafizurrahmanprovat.tech"
            ]
          },
          "offers": {
            "@@type": "Offer",
            "price": "0",
            "priceCurrency": "USD"
          }
        },
        {
          "@@type": "EducationalOrganization",
          "@@id": "https://diusweroutine.live/#organization",
          "name": "Daffodil International University - Department of Software Engineering",
          "url": "https://daffodilvarsity.edu.bd",
          "department": "Software Engineering (SWE)"
        }
      ]
    }
    </script>

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="alternate icon" href="{{ asset('favicon.ico') }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        fluent: {
                            blue: '#0078D4',
                            blueHover: '#106EBE',
                            blueLight: '#EFF6FC',
                            canvas: '#F3F2F1',
                            card: '#FFFFFF',
                            border: '#E1DFDD',
                            borderDark: '#8A8886',
                            text: '#323130',
                            textMuted: '#605E5C',
                            rail: '#FAF9F8',
                            railHover: '#EDEBE9',
                            successBg: '#DFF6DD',
                            successText: '#107C41',
                            warningBg: '#FFF4CE',
                            warningText: '#797775',
                            errorBg: '#FDE7E9',
                            errorText: '#A80000',
                        }
                    },
                    fontFamily: {
                        sans: ['Segoe UI', '-apple-system', 'BlinkMacSystemFont', 'Roboto', 'Plus Jakarta Sans', 'sans-serif'],
                        mono: ['Consolas', 'JetBrains Mono', 'monospace'],
                    },
                    borderRadius: {
                        DEFAULT: '4px',
                        fluent: '4px',
                    },
                    boxShadow: {
                        card: '0 1.6px 3.6px 0 rgba(0, 0, 0, 0.132), 0 0.3px 0.9px 0 rgba(0, 0, 0, 0.108)',
                        hover: '0 3.2px 7.2px 0 rgba(0, 0, 0, 0.132), 0 0.6px 1.8px 0 rgba(0, 0, 0, 0.108)',
                        flyout: '0 6.4px 14.4px 0 rgba(0, 0, 0, 0.132), 0 1.2px 3.6px 0 rgba(0, 0, 0, 0.108)',
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono (Fallback) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- html2canvas for High-Definition Routine Image Export -->
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>

    <style>
        :root {
            /* Microsoft Segoe/Fluent Palette */
            --ms-blue-primary: #0078D4;      /* Microsoft / Outlook Brand Blue */
            --ms-blue-hover: #106EBE;        /* Interactive Hover State */
            --ms-blue-light: #EFF6FC;        /* Subtle Blue Selection Background */
            --ms-bg-canvas: #F3F2F1;         /* Fluent Off-White Canvas */
            --ms-card-bg: #FFFFFF;           /* Card / Modal Surface */
            --ms-border: #E1DFDD;            /* Neutral Subtle Border */
            --ms-text-primary: #323130;      /* Dark Neutral Body Text */
            --ms-text-secondary: #605E5C;    /* Muted Text */

            /* Status Colors */
            --ms-success-bg: #DFF6DD;        /* Light Green Badge Background */
            --ms-success-text: #107C41;      /* Microsoft Excel Green Text */
            --ms-warning-bg: #FFF4CE;        /* Pending / Conflict Background */
            --ms-warning-text: #797775;
            --ms-error-bg: #FDE7E9;
            --ms-error-text: #A80000;

            /* Elevation & Shadows */
            --ms-shadow-card: 0 1.6px 3.6px 0 rgba(0, 0, 0, 0.132), 0 0.3px 0.9px 0 rgba(0, 0, 0, 0.108);
            --ms-shadow-hover: 0 3.2px 7.2px 0 rgba(0, 0, 0, 0.132), 0 0.6px 1.8px 0 rgba(0, 0, 0, 0.108);
            --ms-shadow-flyout: 0 6.4px 14.4px 0 rgba(0, 0, 0, 0.132), 0 1.2px 3.6px 0 rgba(0, 0, 0, 0.108);
            --ms-radius: 4px;                /* Fluent Signature Standard Radius */
        }

        body {
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
            background-color: var(--ms-bg-canvas);
            color: var(--ms-text-primary);
        }

        .font-mono {
            font-family: 'Consolas', 'JetBrains Mono', monospace;
        }

        /* Fluent Navigation Rail Items */
        .sidebar-item {
            border-radius: var(--ms-radius);
            color: var(--ms-text-primary);
            transition: background-color 0.15s ease-in-out, color 0.15s ease-in-out;
            border-left: 3px solid transparent;
        }

        .sidebar-item:hover {
            background-color: #EDEBE9;
            color: #201F1E;
        }

        .sidebar-item.active {
            background-color: var(--ms-blue-light);
            color: var(--ms-blue-primary);
            font-weight: 600;
            border-left: 3px solid var(--ms-blue-primary);
        }

        /* Outlook Calendar Grid Header */
        .routine-grid-header {
            background-color: var(--ms-blue-primary);
            color: #FFFFFF;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Outlook Style Course Card */
        .course-card {
            background: var(--ms-card-bg);
            border: 1px solid var(--ms-border);
            border-left: 4px solid var(--ms-blue-primary);
            border-radius: var(--ms-radius);
            box-shadow: var(--ms-shadow-card);
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .course-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--ms-shadow-hover);
        }

        .course-card.conflict {
            border-left-color: #D83B01;
            background: #FFF9F5;
        }

        /* Free Slot Outline */
        .free-slot {
            border: 1px dashed #D2D0CE;
            border-radius: var(--ms-radius);
            background: #FAF9F8;
            transition: all 0.15s ease;
        }

        .free-slot:hover {
            background: var(--ms-blue-light);
            border-color: var(--ms-blue-primary);
        }

        /* Fluent Message Bar styles */
        .ms-messagebar {
            border-radius: var(--ms-radius);
            padding: 10px 14px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 13px;
            line-height: 1.4;
            border: 1px solid transparent;
        }
        .ms-messagebar-warning {
            background-color: var(--ms-warning-bg);
            color: #323130;
            border-left: 4px solid #797775;
        }
        .ms-messagebar-error {
            background-color: var(--ms-error-bg);
            color: var(--ms-error-text);
            border-left: 4px solid #A80000;
        }
        .ms-messagebar-success {
            background-color: var(--ms-success-bg);
            color: var(--ms-success-text);
            border-left: 4px solid #107C41;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 7px; height: 7px; }
        ::-webkit-scrollbar-track { background: #EDEBE9; }
        ::-webkit-scrollbar-thumb { background: #C8C6C4; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #8A8886; }

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
                border: 1px solid #C8C6C4 !important;
                background: #FFFFFF !important;
                color: #323130 !important;
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
                border: 1px solid #C8C6C4 !important;
                padding: 2.5px 3px !important;
                color: #323130 !important;
                vertical-align: top !important;
                word-wrap: break-word !important;
                page-break-inside: avoid !important;
                break-inside: avoid !important;
            }
            .print-table th {
                background: #0078D4 !important;
                color: #ffffff !important;
                font-weight: 700 !important;
                font-size: 7pt !important;
                text-align: center !important;
            }
        }

        /* ==========================================================================
           EXPORT-FIX-04: DEDICATED HIGH-DPI A4 LANDSCAPE EXPORT OVERRIDE ENGINE
           ========================================================================== */
        .export-mode,
        .export-mode-compact {
            width: 1920px !important;
            min-width: 1920px !important;
            max-width: 1920px !important;
            background-color: #FFFFFF !important;
            color: #323130 !important;
            margin: 0 !important;
            padding: 0 !important;
            overflow: visible !important;
            box-sizing: border-box !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .export-mode table,
        .export-mode-compact table {
            width: 100% !important;
            min-width: 100% !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            background-color: #FFFFFF !important;
        }

        /* Table Headers */
        .export-mode th,
        .export-mode-compact th {
            padding: 8px 6px !important;
            font-size: 12px !important;
            line-height: 1.25 !important;
            font-weight: 700 !important;
            background-color: #0078D4 !important;
            color: #FFFFFF !important;
            border: 1px solid #106EBE !important;
            text-align: center !important;
            vertical-align: middle !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        /* Table Data Cells */
        .export-mode td,
        .export-mode-compact td {
            padding: 5px 6px !important;
            border: 1px solid #E1DFDD !important;
            vertical-align: top !important;
            box-sizing: border-box !important;
            overflow: visible !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        /* Time Slot Column (Column 1) */
        .export-mode td:first-child,
        .export-mode-compact td:first-child {
            background-color: #F3F2F1 !important;
            padding: 8px 6px !important;
            text-align: center !important;
            vertical-align: middle !important;
        }

        .export-mode td:first-child div:first-child,
        .export-mode-compact td:first-child div:first-child {
            font-size: 13px !important;
            font-weight: 800 !important;
            line-height: 1.25 !important;
            color: #201F1E !important;
            font-family: 'Consolas', 'JetBrains Mono', monospace !important;
        }

        .export-mode td:first-child div:last-child,
        .export-mode-compact td:first-child div:last-child {
            font-size: 11px !important;
            line-height: 1.25 !important;
            color: #605E5C !important;
            margin-top: 2px !important;
        }

        /* [EXPORT-FIX-01]: Dynamic Card Height & Text Visibility (font-size: 11px–13px, line-height: 1.25, overflow: visible) */
        .export-mode .course-card,
        .export-mode-compact .course-card {
            height: auto !important;
            min-height: auto !important;
            max-height: none !important;
            padding: 8px 10px !important;
            margin-bottom: 5px !important;
            box-shadow: none !important;
            border: 1px solid #D2D0CE !important;
            border-left: 4px solid #0078D4 !important;
            background-color: #FFFFFF !important;
            overflow: visible !important;
            box-sizing: border-box !important;
            page-break-inside: avoid !important;
            break-inside: avoid !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .export-mode .course-card.conflict,
        .export-mode .course-card.border-l-\[\#D83B01\],
        .export-mode-compact .course-card.conflict,
        .export-mode-compact .course-card.border-l-\[\#D83B01\] {
            border-left-color: #D83B01 !important;
            background-color: #FFF9F5 !important;
        }

        /* Remove text truncation, line clamps, and ellipses */
        .export-mode .course-card *,
        .export-mode-compact .course-card * {
            max-height: none !important;
            text-overflow: clip !important;
            overflow: visible !important;
        }

        /* Course Code (font-size: 13px bold) */
        .export-mode .course-card .course-code-text,
        .export-mode-compact .course-card .course-code-text,
        .export-mode .course-card span.tracking-tight,
        .export-mode-compact .course-card span.tracking-tight {
            font-size: 13px !important;
            font-weight: 800 !important;
            line-height: 1.25 !important;
            color: #201F1E !important;
            display: block !important;
            overflow: visible !important;
            white-space: normal !important;
        }

        /* Course Title (font-size: 11.5px, line-height: 1.25, line-clamp unset) */
        .export-mode .course-card .course-title-text,
        .export-mode-compact .course-card .course-title-text,
        .export-mode .course-card .line-clamp-1,
        .export-mode .course-card .line-clamp-2,
        .export-mode-compact .course-card .line-clamp-1,
        .export-mode-compact .course-card .line-clamp-2 {
            font-size: 11.5px !important;
            font-weight: 600 !important;
            line-height: 1.25 !important;
            color: #0078D4 !important;
            display: block !important;
            overflow: visible !important;
            white-space: normal !important;
            -webkit-line-clamp: unset !important;
            -webkit-box-orient: unset !important;
            margin-top: 2px !important;
            margin-bottom: 3px !important;
        }

        /* Faculty Name & Initials (font-size: 11px, line-height: 1.25, truncate unset) */
        .export-mode .course-card .faculty-name-text,
        .export-mode-compact .course-card .faculty-name-text,
        .export-mode .course-card .truncate,
        .export-mode-compact .course-card .truncate {
            font-size: 11px !important;
            font-weight: 600 !important;
            line-height: 1.25 !important;
            color: #323130 !important;
            display: inline-block !important;
            overflow: visible !important;
            white-space: normal !important;
            text-overflow: clip !important;
        }

        .export-mode .course-card .faculty-badge-text,
        .export-mode-compact .course-card .faculty-badge-text {
            font-size: 11px !important;
            font-weight: 700 !important;
            line-height: 1.2 !important;
            padding: 1px 4px !important;
            background-color: #EFF6FC !important;
            color: #0078D4 !important;
            border: 1px solid #C7E0F4 !important;
            border-radius: 4px !important;
            display: inline-block !important;
        }

        /* Classroom & Building (font-size: 11px / 10.5px, line-height: 1.25) */
        .export-mode .course-card .room-text,
        .export-mode-compact .course-card .room-text {
            font-size: 11px !important;
            font-weight: 700 !important;
            line-height: 1.25 !important;
            color: #107C41 !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 3px !important;
        }

        .export-mode .course-card .building-text,
        .export-mode-compact .course-card .building-text {
            font-size: 10.5px !important;
            line-height: 1.25 !important;
            color: #605E5C !important;
            font-family: 'Consolas', 'JetBrains Mono', monospace !important;
        }

        /* [EXPORT-FIX-02]: Compact Empty Time Slots: 48px min-height, reduced padding, consistent alignment */
        .export-mode .free-slot,
        .export-mode .weekend-cell,
        .export-mode-compact .free-slot,
        .export-mode-compact .weekend-cell {
            min-height: 48px !important;
            height: 48px !important;
            padding: 4px 6px !important;
            background-color: #FAF9F8 !important;
            border: 1px dashed #D2D0CE !important;
            border-radius: 4px !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
            box-sizing: border-box !important;
            margin: 0 !important;
        }

        .export-mode .free-slot span,
        .export-mode .weekend-cell span,
        .export-mode-compact .free-slot span,
        .export-mode-compact .weekend-cell span {
            font-size: 11px !important;
            font-weight: 600 !important;
            line-height: 1.25 !important;
            color: #8A8886 !important;
            display: inline-block !important;
        }

        .export-mode .free-slot svg,
        .export-mode-compact .free-slot svg,
        .export-mode .free-slot span.hidden,
        .export-mode-compact .free-slot span.hidden {
            display: none !important;
        }

        /* Hide interactive non-printable elements in export */
        .export-mode .no-print,
        .export-mode-compact .no-print {
            display: none !important;
        }

        .print-only { display: none; }
    </style>
</head>
<body class="bg-[#F3F2F1] text-[#323130] min-h-screen antialiased flex flex-col selection:bg-[#0078D4] selection:text-white">

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
                <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="DIU SWE Logo" class="h-7 w-auto object-contain shrink-0">
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
        <aside class="no-print w-full md:w-64 lg:w-72 bg-[#FAF9F8] border-r border-[#E1DFDD] shadow-xs flex flex-col shrink-0 text-[#323130] relative z-30 select-none">
            
            <!-- Sidebar Header: DIU Logo & University Branding -->
            <div class="p-4 border-b border-[#E1DFDD] bg-white">
                <a href="{{ route('routine.index') }}" class="flex items-center gap-3 group focus:outline-none">
                    <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="DIU SWE Logo" class="h-9 w-auto max-w-[56px] object-contain shrink-0 group-hover:scale-105 transition-transform duration-200">
                    <div class="min-w-0">
                        <h1 class="text-sm font-bold tracking-tight text-[#323130] truncate group-hover:text-[#0078D4] transition">
                            Daffodil Int. University
                        </h1>
                        <h2 class="text-xs text-[#605E5C] font-semibold flex items-center gap-1.5 mt-0.5">
                            <span class="w-2 h-2 rounded-full bg-[#0078D4]"></span>
                            Dept of SWE • Routine
                        </h2>
                    </div>
                </a>
            </div>

            <!-- Mobile Menu Toggle Button (Visible on Small Screens) -->
            <div class="md:hidden px-4 py-2.5 bg-[#F3F2F1] border-b border-[#E1DFDD] flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-[#605E5C]">Navigation Rail</span>
                <button type="button" onclick="toggleMobileMenu()" class="p-1.5 rounded bg-white border border-[#E1DFDD] text-[#323130] hover:bg-[#EDEBE9] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>

            <!-- Vertical Menu Navigation Rail Stack -->
            <nav id="sidebarNav" class="flex-1 p-3 space-y-1 overflow-y-auto hidden md:block">
                
                <div class="px-3 py-1.5 text-[11px] font-bold uppercase tracking-wider text-[#605E5C]">
                    Command Center
                </div>

                <!-- 1. Weekly Routine Matrix -->
                <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => $viewMode]) }}" class="sidebar-item flex items-center justify-between px-3 py-2.5 text-xs sm:text-sm font-semibold {{ $activeTab === 'routine' ? 'active' : '' }}">
                    <div class="flex items-center gap-2.5">
                        <!-- Calendar24Regular -->
                        <svg class="w-4 h-4 shrink-0 {{ $activeTab === 'routine' ? 'text-[#0078D4]' : 'text-[#605E5C]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Weekly Routine Matrix</span>
                    </div>
                    @if($activeTab === 'routine')
                        <span class="w-1.5 h-1.5 rounded-full bg-[#0078D4]"></span>
                    @endif
                </a>

                <!-- 2. Faculty Directory & Schedules -->
                <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $facultyQuery ?? 'MRA']) }}" class="sidebar-item flex items-center justify-between px-3 py-2.5 text-xs sm:text-sm font-semibold {{ $activeTab === 'faculty' ? 'active' : '' }}">
                    <div class="flex items-center gap-2.5">
                        <!-- People24Regular -->
                        <svg class="w-4 h-4 shrink-0 {{ $activeTab === 'faculty' ? 'text-[#0078D4]' : 'text-[#605E5C]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span>Faculty Directory</span>
                    </div>
                    <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold {{ $activeTab === 'faculty' ? 'bg-[#0078D4] text-white' : 'bg-[#EDEBE9] text-[#605E5C]' }}">
                        {{ count($facultyDirectory) }}
                    </span>
                </a>

                <!-- 3. Empty Room Tracker -->
                <a href="{{ route('routine.index', ['tab' => 'empty_rooms', 'empty_day' => $emptyDay, 'empty_slot' => $emptySlot]) }}" class="sidebar-item flex items-center justify-between px-3 py-2.5 text-xs sm:text-sm font-semibold {{ $activeTab === 'empty_rooms' ? 'active' : '' }}">
                    <div class="flex items-center gap-2.5">
                        <!-- DoorArrowLeft24Regular -->
                        <svg class="w-4 h-4 shrink-0 {{ $activeTab === 'empty_rooms' ? 'text-[#0078D4]' : 'text-[#605E5C]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                        <span>Empty Room Tracker</span>
                    </div>
                    <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-[#DFF6DD] text-[#107C41]">
                        {{ $roomAnalysis['available_count'] }} Free
                    </span>
                </a>

                <!-- 4. Custom Routine Builder -->
                <a href="{{ route('routine.index', ['tab' => 'custom']) }}" class="sidebar-item flex items-center justify-between px-3 py-2.5 text-xs sm:text-sm font-semibold {{ $activeTab === 'custom' ? 'active' : '' }}">
                    <div class="flex items-center gap-2.5">
                        <!-- Grid24Regular -->
                        <svg class="w-4 h-4 shrink-0 {{ $activeTab === 'custom' ? 'text-[#0078D4]' : 'text-[#605E5C]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm10 0a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zm10 0a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"></path></svg>
                        <span>Custom Routine</span>
                    </div>
                    @if(count($customSlotIds) > 0)
                        <span id="sidebarCustomBadge" class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-[#0078D4] text-white">
                            {{ count($customSlotIds) }}
                        </span>
                    @else
                        <span id="sidebarCustomBadge" class="hidden px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-[#0078D4] text-white">
                            0
                        </span>
                    @endif
                </a>

                <!-- 5. Course Offer Directory -->
                <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => $offeringBatch ?? 41]) }}" class="sidebar-item flex items-center justify-between px-3 py-2.5 text-xs sm:text-sm font-semibold {{ $activeTab === 'offerings' ? 'active' : '' }}">
                    <div class="flex items-center gap-2.5">
                        <!-- Book24Regular -->
                        <svg class="w-4 h-4 shrink-0 {{ $activeTab === 'offerings' ? 'text-[#0078D4]' : 'text-[#605E5C]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <span>Course Offer Directory</span>
                    </div>
                    <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-[#EFF6FC] text-[#0078D4]">
                        {{ $offeringsCount ?? $offerings->count() }}
                    </span>
                </a>

                <!-- Export Shortcuts in Sidebar -->
                <div class="pt-4 mt-3 border-t border-[#E1DFDD]">
                    <div class="px-3 py-1 text-[11px] font-bold uppercase tracking-wider text-[#605E5C]">
                        Export Timetable
                    </div>
                    <div class="space-y-1.5 mt-1">
                        <!-- Add to Outlook Calendar (.ics) -->
                        <a href="{{ route('routine.export.ics', ['batch' => $batch, 'section' => $section, 'major_track' => $track]) }}" title="Download RFC-5545 iCalendar for Microsoft Outlook & Teams" class="w-full flex items-center gap-2 px-3 py-2 rounded text-xs font-semibold text-white bg-[#0078D4] hover:bg-[#106EBE] transition shadow-xs">
                            <svg class="w-3.5 h-3.5 text-white shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>Add to Outlook (.ics)</span>
                        </a>

                        <!-- Download Routine Image (PNG) -->
                        <button type="button" onclick="exportRoutineImage('weeklyRoutineContainer', 'DIU_SWE_Batch_{{ $batch }}_{{ $section }}_Weekly_Routine_A4_Landscape')" class="w-full flex items-center gap-2 px-3 py-2 rounded text-xs font-semibold text-[#323130] bg-white hover:bg-[#EDEBE9] border border-[#E1DFDD] transition shadow-xs">
                            <svg class="w-3.5 h-3.5 text-[#0078D4] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            <span>Download Image (PNG)</span>
                        </button>

                        <!-- Export Routine Data (CSV) -->
                        <a href="{{ route('routine.export.csv', ['batch' => $batch, 'section' => $section, 'major_track' => $track]) }}" class="w-full flex items-center gap-2 px-3 py-2 rounded text-xs font-semibold text-[#107C41] bg-[#DFF6DD] hover:bg-[#C7E0C7] border border-[#9FD89F] transition shadow-xs">
                            <svg class="w-3.5 h-3.5 text-[#107C41] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span>Export Data (CSV)</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Sidebar Footer: Academic Session Info -->
            <div class="p-3.5 border-t border-[#E1DFDD] bg-white text-[11px] text-[#605E5C] mt-auto">
                <div class="font-bold text-[#323130] flex items-center justify-between">
                    <span class="flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-[#107C41]"></span>
                        Fall 2026 Session
                    </span>
                    <span class="text-[9px] px-1.5 py-0.5 rounded bg-[#EFF6FC] text-[#0078D4] font-mono font-bold">Active</span>
                </div>
                <div class="text-[10px] text-[#605E5C] mt-0.5">Effective: September 19, 2026</div>
                <div class="text-[10px] text-[#0078D4] mt-0.5 font-mono font-semibold">Batch {{ $batch }} • Section {{ $section }}</div>
                <div class="text-[10px] text-[#605E5C] mt-0.5 font-mono">Routine Hours: 08:30 AM – 05:30 PM</div>
                
                <div class="mt-3 pt-2.5 border-t border-[#EDEBE9] flex items-center justify-between">
                    <button type="button" onclick="openAboutModal()" class="text-[#0078D4] hover:underline text-[11px] font-semibold flex items-center gap-1 cursor-pointer">
                        <svg class="w-3.5 h-3.5 text-[#0078D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Student Guide &amp; Tips</span>
                    </button>
                    <span class="text-[10px] text-[#A19F9D]">DIU SWE</span>
                </div>
            </div>
        </aside>

        {{-- ============================================================== --}}
        {{-- MAIN CONTENT CANVAS (MICROSOFT FLUENT THEME)                  --}}
        {{-- ============================================================== --}}
        <div class="flex-1 flex flex-col min-w-0 bg-[#F3F2F1] text-[#323130]">

            <!-- Top Microsoft 365 Campus Header Bar -->
            <header class="no-print bg-[#0078D4] text-white text-xs py-2 px-4 sm:px-6 shadow-xs flex items-center justify-between gap-3">
                <div class="flex items-center gap-2.5">
                    <span class="font-bold tracking-tight text-white flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span>Daffodil Smart City (DSC), Ashulia</span>
                    </span>
                    <span class="hidden md:inline text-sky-200">|</span>
                    <span class="hidden md:inline text-sky-100 font-medium">Faculty of Science & Information Technology (FSIT)</span>
                </div>

                <div class="flex items-center gap-3 text-xs font-semibold">
                    <span class="hidden sm:inline-flex items-center gap-1.5 text-white bg-white/20 px-2.5 py-0.5 rounded">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-300 animate-pulse"></span>
                        Live Timetable Matrix
                    </span>
                    <span id="liveClock" class="font-mono text-white font-bold"></span>
                </div>
            </header>

            <!-- Main Content Canvas -->
            <main class="flex-1 p-4 sm:p-6 max-w-7xl w-full mx-auto space-y-5">

                <!-- Compact Academic Title Strip (Small top section) -->
                <div class="no-print flex flex-wrap items-center justify-between gap-3 bg-white border border-[#E1DFDD] rounded-[4px] px-4 py-2.5 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.06)]">
                    <div class="flex items-center gap-2.5 min-w-0">
                        <div class="w-8 h-8 rounded-[4px] bg-[#0078D4] text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-2xs">
                            SWE
                        </div>
                        <div class="min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <h1 class="text-sm sm:text-base font-bold text-[#323130] tracking-tight leading-none">
                                    DIU SWE Routine Organizer
                                </h1>
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-semibold">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span>Fall 2026 Live</span>
                                </span>
                            </div>
                            <p class="text-[11px] text-[#605E5C] truncate mt-0.5">
                                Daffodil International University • Dept of SWE • Ashulia Smart City
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 shrink-0">
                        <button type="button" onclick="window.print()" class="px-2.5 py-1.5 rounded-[4px] bg-[#FAF9F8] hover:bg-[#EDEBE9] text-[#323130] border border-[#E1DFDD] text-xs font-semibold transition flex items-center gap-1.5 cursor-pointer shadow-2xs" title="Print Routine">
                            <svg class="w-3.5 h-3.5 text-[#605E5C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            <span>Print</span>
                        </button>
                        <button type="button" onclick="exportRoutineImage('weeklyRoutineContainer', 'DIU_SWE_Batch_{{ $batch }}_{{ $section }}_Weekly_Routine_A4_Landscape')" class="px-2.5 py-1.5 rounded-[4px] bg-[#0078D4] hover:bg-[#106EBE] text-white text-xs font-semibold transition flex items-center gap-1.5 cursor-pointer shadow-2xs" title="Download Routine Image">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            <span>Download Routine</span>
                        </button>
                    </div>
                </div>

                {{-- ============================================================== --}}
                {{-- TAB 1: WEEKLY ROUTINE MATRIX (DEFAULT)                         --}}
                {{-- ============================================================== --}}
                @if($activeTab === 'routine')
                    <div class="space-y-4">

                        <!-- Unified Routine Control Hub Container (Merged in single container build) -->
                        <div id="routineControlHub" class="no-print bg-white border border-[#E1DFDD] rounded-[4px] p-4 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.08)] space-y-3.5">
                            
                            <!-- Row 1: Dropdown Selectors & Actions -->
                            <form method="GET" action="{{ route('routine.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3 items-end">
                                <input type="hidden" name="tab" value="routine">
                                <input type="hidden" name="view_mode" value="{{ $viewMode }}">

                                <!-- Batch Selector -->
                                <div class="lg:col-span-3">
                                    <label class="block text-xs font-semibold text-[#323130] mb-1 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-[#0078D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                        <span>Target Batch</span>
                                    </label>
                                    <select name="batch" onchange="this.form.submit()" class="w-full bg-white border border-[#E1DFDD] rounded-[4px] px-3 py-1.5 text-[#323130] font-medium focus:outline-none focus:border-[#0078D4] focus:ring-1 focus:ring-[#0078D4] transition text-xs sm:text-sm">
                                        @foreach($availableBatches as $b)
                                            <option value="{{ $b }}" {{ $batch == $b ? 'selected' : '' }}>
                                                Batch {{ $b }} @if($b == 41) (Major Tracks) @elseif($b == 40) (Graduating) @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Section Selector -->
                                <div class="lg:col-span-2">
                                    <label class="block text-xs font-semibold text-[#323130] mb-1 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-[#0078D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                                        <span>Section</span>
                                    </label>
                                    @php
                                        $sectionsList = $sectionsList ?? range('A', $batch === 40 ? 'F' : ($batch === 41 ? 'L' : (in_array($batch, [43, 44, 45]) ? 'N' : 'M')));
                                    @endphp
                                    <select name="section" onchange="this.form.submit()" class="w-full bg-white border border-[#E1DFDD] rounded-[4px] px-3 py-1.5 text-[#323130] font-medium focus:outline-none focus:border-[#0078D4] focus:ring-1 focus:ring-[#0078D4] transition text-xs sm:text-sm">
                                        @foreach($sectionsList as $sec)
                                            <option value="{{ $sec }}" {{ $section === $sec ? 'selected' : '' }}>
                                                Section {{ $sec }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Track Selector (Batch 41 specific) -->
                                <div class="lg:col-span-3">
                                    <label class="block text-xs font-semibold text-[#323130] mb-1 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-[#0078D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                        <span>Track</span>
                                    </label>
                                    <select name="major_track" onchange="this.form.submit()" class="w-full bg-white border border-[#E1DFDD] rounded-[4px] px-3 py-1.5 text-[#323130] font-medium focus:outline-none focus:border-[#0078D4] focus:ring-1 focus:ring-[#0078D4] transition text-xs sm:text-sm {{ $batch !== 41 ? 'opacity-50' : '' }}">
                                        <option value="">Core Syllabus</option>
                                        <option value="SE" {{ $track === 'SE' ? 'selected' : '' }}>SE • Software Eng</option>
                                        <option value="DS" {{ $track === 'DS' ? 'selected' : '' }}>DS • Data Science</option>
                                        <option value="RE" {{ $track === 'RE' ? 'selected' : '' }}>RE • Robotics &amp; Emb</option>
                                        <option value="ST" {{ $track === 'ST' ? 'selected' : '' }}>ST • Testing</option>
                                        <option value="CS" {{ $track === 'CS' ? 'selected' : '' }}>CS • Cyber Sec</option>
                                    </select>
                                </div>

                                <!-- Load & View Switcher -->
                                <div class="lg:col-span-4 flex items-center gap-2">
                                    <button type="submit" class="flex-1 bg-[#0078D4] hover:bg-[#106EBE] text-white font-semibold px-3 py-1.5 rounded-[4px] transition shadow-xs text-xs sm:text-sm flex items-center justify-center gap-1.5 cursor-pointer">
                                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                        <span>Load</span>
                                    </button>

                                    <!-- View Mode Toggle -->
                                    <div class="inline-flex rounded-[4px] bg-[#F3F2F1] p-0.5 border border-[#E1DFDD] text-xs font-semibold shrink-0">
                                        <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => 'grid']) }}" title="Matrix Grid" class="px-2 py-1 rounded-[4px] transition flex items-center gap-1 {{ $viewMode === 'grid' ? 'bg-[#0078D4] text-white shadow-xs' : 'text-[#605E5C] hover:text-[#323130]' }}">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                            <span class="hidden sm:inline">Grid</span>
                                        </a>
                                        <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $section, 'major_track' => $track, 'view_mode' => 'cards']) }}" title="Day Cards" class="px-2 py-1 rounded-[4px] transition flex items-center gap-1 {{ $viewMode === 'cards' ? 'bg-[#0078D4] text-white shadow-xs' : 'text-[#605E5C] hover:text-[#323130]' }}">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                            <span class="hidden sm:inline">Cards</span>
                                        </a>
                                    </div>

                                    <!-- Quick Export Triggers -->
                                    <div class="flex items-center gap-1 shrink-0">
                                        <a href="{{ route('routine.export.ics', ['batch' => $batch, 'section' => $section, 'major_track' => $track]) }}" title="Add to Outlook (.ics)" class="p-1.5 rounded-[4px] bg-[#0078D4] hover:bg-[#106EBE] text-white transition shadow-2xs">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </a>
                                        <button type="button" onclick="exportRoutineImage('weeklyRoutineContainer', 'DIU_SWE_Batch_{{ $batch }}_{{ $section }}_Weekly_Routine_A4_Landscape')" title="Download Routine Image (PNG)" class="p-1.5 rounded-[4px] bg-white hover:bg-[#EDEBE9] text-[#323130] border border-[#E1DFDD] transition shadow-2xs cursor-pointer">
                                            <svg class="w-3.5 h-3.5 text-[#0078D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        </button>
                                        <a href="{{ route('routine.export.csv', ['batch' => $batch, 'section' => $section, 'major_track' => $track]) }}" title="Export Routine Data (CSV)" class="p-1.5 rounded-[4px] bg-[#DFF6DD] hover:bg-[#C7E0C7] text-[#107C41] border border-[#9FD89F] transition shadow-2xs">
                                            <svg class="w-3.5 h-3.5 text-[#107C41]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </form>

                            <!-- Row 2: 1-Tap Section Navigator Strip -->
                            <div class="pt-2.5 border-t border-[#EDEBE9] flex items-center gap-2 overflow-x-auto py-0.5 no-scrollbar">
                                <span class="text-[11px] font-bold text-[#605E5C] uppercase tracking-wider shrink-0">
                                    Section:
                                </span>
                                <div class="flex items-center gap-1.5 flex-nowrap shrink-0">
                                    @foreach($sectionsList as $sec)
                                        <a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => $batch, 'section' => $sec, 'major_track' => $track, 'view_mode' => $viewMode]) }}"
                                           class="px-2.5 py-1 rounded-[4px] text-xs font-bold transition shrink-0 {{ $section === $sec ? 'bg-[#0078D4] text-white shadow-2xs ring-2 ring-[#0078D4]/25' : 'bg-[#F3F2F1] hover:bg-[#EDEBE9] text-[#323130] border border-[#E1DFDD]' }}">
                                            {{ $sec }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Row 3: 1-Tap Day Filter & Routine Meta Summary -->
                            <div class="pt-2.5 border-t border-[#EDEBE9] flex flex-wrap items-center justify-between gap-2.5">
                                <div class="flex items-center gap-1.5 overflow-x-auto py-0.5 no-scrollbar">
                                    <span class="text-[11px] font-bold text-[#605E5C] uppercase tracking-wider shrink-0 mr-0.5">
                                        Day:
                                    </span>
                                    <button type="button" onclick="filterRoutineDay('ALL')" data-day="ALL" class="day-nav-pill px-2.5 py-1 rounded-[4px] text-xs font-bold transition shrink-0 bg-[#0078D4] text-white shadow-2xs cursor-pointer">
                                        All
                                    </button>
                                    @php
                                        $orderedDaysList = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                                    @endphp
                                    @foreach($orderedDaysList as $d)
                                        @php
                                            $dayClassCount = isset($routines[$d]) ? $routines[$d]->count() : 0;
                                        @endphp
                                        <button type="button" onclick="filterRoutineDay('{{ $d }}')" data-day="{{ $d }}" class="day-nav-pill px-2 py-1 rounded-[4px] text-xs font-bold transition shrink-0 bg-white text-[#323130] hover:bg-[#EDEBE9] border border-[#E1DFDD] flex items-center gap-1 cursor-pointer">
                                            <span>{{ substr($d, 0, 3) }}</span>
                                            @if($dayClassCount > 0)
                                                <span class="px-1 py-0.2 rounded-full text-[9px] bg-[#EFF6FC] text-[#0078D4] font-mono font-bold">{{ $dayClassCount }}</span>
                                            @endif
                                        </button>
                                    @endforeach
                                </div>

                                <div class="text-xs text-[#605E5C] flex items-center gap-2">
                                    <span class="font-bold text-[#323130]">Batch {{ $batch }}-{{ $section }}</span>
                                    @if($track)
                                        <span class="px-1.5 py-0.5 rounded bg-[#EFF6FC] text-[#0078D4] text-[10px] font-semibold border border-[#C7E0F4]">{{ $track }}</span>
                                    @endif
                                    <span>•</span>
                                    <span>{{ $routines->flatten(1)->count() }} classes</span>
                                </div>
                            </div>

                        </div>

                        {{-- VIEW OPTION A: WEEKLY TIMETABLE GRID MATRIX (OUTLOOK CALENDAR LOOK: TIME ROWS x SAT-FRI COLUMNS) --}}
                        @if($viewMode === 'grid')
                            <div id="weeklyRoutineContainer" class="rounded-[4px] border border-[#E1DFDD] bg-white shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)] p-0 overflow-hidden">
                                
                                <div class="px-4 py-3 bg-[#0078D4] text-white flex items-center justify-between border-b border-[#106EBE]">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="DIU SWE Logo" class="h-9 w-auto max-w-[56px] object-contain shrink-0 drop-shadow-sm">
                                        <div>
                                            <div class="text-sm font-bold tracking-wide flex items-center gap-1.5 text-white">
                                                <span>Daffodil International University</span>
                                                <span class="text-[#EFF6FC]">•</span>
                                                <span class="text-white">Dept of SWE</span>
                                            </div>
                                            <div class="text-[11px] text-[#EFF6FC] font-medium">
                                                Class Routine • Batch {{ $batch }} • Section {{ $section }} @if($track)({{ $track }})@endif • Fall 2026 Academic Session
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right text-[10px] leading-tight">
                                        <div class="font-mono text-white font-bold">Effective: Sept 19, 2026</div>
                                        <div class="text-[#EFF6FC] text-[9.5px]">Ashulia Smart City (DSC) • A4 Landscape</div>
                                    </div>
                                </div>

                                <div class="overflow-x-auto shadow-inner">
                                    <table class="w-full border-collapse text-left text-xs print-table" style="table-layout: fixed; min-width: 1080px; width: 100%;">
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
                                            <tr class="routine-grid-header bg-[#0078D4] text-white border-b border-[#106EBE] sticky top-0 z-20 shadow-xs">
                                                <th class="p-2 sm:p-2.5 font-bold uppercase tracking-wider text-white border-r border-[#106EBE] text-center sticky left-0 z-30 bg-[#0078D4] shadow-[2px_0_4px_-1px_rgba(0,0,0,0.12)]">
                                                    <div class="text-xs font-bold uppercase tracking-wider text-white">Time</div>
                                                    <div class="text-[9px] font-normal text-[#EFF6FC]">Period</div>
                                                </th>
                                                <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#106EBE] grid-day-col transition-all" data-day="Saturday">
                                                    <div class="text-white font-bold text-xs uppercase tracking-wide">Saturday</div>
                                                    <div class="text-[9.5px] font-medium text-[#EFF6FC]">Sat</div>
                                                </th>
                                                <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#106EBE] grid-day-col transition-all" data-day="Sunday">
                                                    <div class="text-white font-bold text-xs uppercase tracking-wide">Sunday</div>
                                                    <div class="text-[9.5px] font-medium text-[#EFF6FC]">Sun</div>
                                                </th>
                                                <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#106EBE] grid-day-col transition-all" data-day="Monday">
                                                    <div class="text-white font-bold text-xs uppercase tracking-wide">Monday</div>
                                                    <div class="text-[9.5px] font-medium text-[#EFF6FC]">Mon</div>
                                                </th>
                                                <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#106EBE] grid-day-col transition-all" data-day="Tuesday">
                                                    <div class="text-white font-bold text-xs uppercase tracking-wide">Tuesday</div>
                                                    <div class="text-[9.5px] font-medium text-[#EFF6FC]">Tue</div>
                                                </th>
                                                <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#106EBE] grid-day-col transition-all" data-day="Wednesday">
                                                    <div class="text-white font-bold text-xs uppercase tracking-wide">Wednesday</div>
                                                    <div class="text-[9.5px] font-medium text-[#EFF6FC]">Wed</div>
                                                </th>
                                                <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#106EBE] grid-day-col transition-all" data-day="Thursday">
                                                    <div class="text-white font-bold text-xs uppercase tracking-wide">Thursday</div>
                                                    <div class="text-[9.5px] font-medium text-[#EFF6FC]">Thu</div>
                                                </th>
                                                <th class="p-2 sm:p-2.5 font-bold text-center grid-day-col transition-all" data-day="Friday">
                                                    <div class="text-white font-bold text-xs uppercase tracking-wide">Friday</div>
                                                    <div class="text-[9.5px] font-medium text-[#EFF6FC]">Fri</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-[#E1DFDD] bg-white">
                                            @php
                                                $orderedDays = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                                            @endphp
                                            @foreach($timeSlots as $slot)
                                                <tr class="hover:bg-[#FAF9F8] transition-colors">
                                                    <!-- Time Slot Header Cell (First Column) -->
                                                    <td class="p-2 sm:p-2.5 bg-[#F3F2F1] border-r border-[#E1DFDD] align-top text-center sticky left-0 z-10 shadow-[2px_0_4px_-1px_rgba(0,0,0,0.06)]">
                                                        <div class="flex flex-col items-center justify-center py-0.5">
                                                            <span class="text-xs font-bold text-[#0078D4] font-mono tracking-tight whitespace-nowrap">
                                                                {{ !empty($slot['start']) ? date('h:i A', strtotime($slot['start'])) : explode('-', $slot['short'] ?? '')[0] }}
                                                            </span>
                                                            <span class="text-[8.5px] font-semibold text-[#8A8886] uppercase tracking-wider my-0.5">to</span>
                                                            <span class="text-xs font-bold text-[#323130] font-mono tracking-tight whitespace-nowrap">
                                                                {{ !empty($slot['end']) ? date('h:i A', strtotime($slot['end'])) : (explode('-', $slot['short'] ?? '')[1] ?? '') }}
                                                            </span>
                                                            <span class="text-[9px] text-[#A19F9D] font-mono mt-0.5 font-semibold">({{ $slot['short'] ?? '8:30-10:00' }})</span>
                                                        </div>
                                                    </td>

                                                    <!-- 7 Academic Day Columns (Saturday to Friday) -->
                                                    @foreach($orderedDays as $day)
                                                        @php
                                                             $slotClasses = $weeklyGrid[$day][$slot['label']] ?? [];
                                                             $classCount = count($slotClasses);
                                                        @endphp
                                                        <td class="p-1 sm:p-1.5 border-r border-[#E1DFDD] last:border-r-0 align-top grid-day-col transition-all" data-day="{{ $day }}">
                                                            @if(!empty($slotClasses))
                                                                <div class="space-y-1">
                                                                    @if($classCount > 1)
                                                                        <div class="flex items-center justify-between text-[7px] font-bold uppercase px-1 py-0.5 rounded-[4px] bg-[#FED9CC] text-[#8A3707] border border-[#F7630C]">
                                                                            <span class="truncate">⚡ {{ $slotClasses[0]->conflict_label ?? 'Concurrent Slot' }}</span>
                                                                            <span class="shrink-0 ml-1 font-mono font-bold">{{ $classCount }}</span>
                                                                        </div>
                                                                    @endif

                                                                    @foreach($slotClasses as $cls)
                                                                        @php
                                                                            $isCustom = in_array($cls->id, $customSlotIds);
                                                                            $isConflict = !empty($cls->is_conflict) || $classCount > 1;
                                                                            $borderLeftClass = $isConflict ? 'border-l-[#D83B01]' : 'border-l-[#0078D4]';
                                                                        @endphp
                                                                        <div class="course-card has-fluent-callout group relative rounded-[4px] border border-[#E1DFDD] border-l-4 {{ $borderLeftClass }} bg-white p-1.5 sm:p-2 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)] hover:shadow-[0_4px_10px_0_rgba(0,120,212,0.18)] hover:-translate-y-0.5 transition-all print-card cursor-pointer"
                                                                             data-course-id="{{ $cls->course_id }}"
                                                                             data-course-name="{{ $cls->course_name ?? $cls->course_id }}"
                                                                             data-teacher-name="{{ $cls->teacher_name }}"
                                                                             data-teacher-initials="{{ $cls->teacher_initials }}"
                                                                             data-teacher-designation="{{ $cls->teacher_designation }}"
                                                                             data-room="{{ $cls->classroom_no }}"
                                                                             data-building="{{ $cls->building }}"
                                                                             data-batch="{{ $cls->batch }}"
                                                                             data-section="{{ $cls->section }}"
                                                                             data-track="{{ $cls->major_track ?? '' }}"
                                                                             data-day="{{ $day }}"
                                                                             data-slot="{{ $slot['label'] }}"
                                                                             data-slot-id="{{ $cls->id }}"
                                                                             data-is-custom="{{ $isCustom ? '1' : '0' }}">
                                                                            @if(!empty($cls->is_continuation))
                                                                                <div class="mb-0.5 inline-flex items-center gap-1 text-[7.5px] font-semibold px-1 py-0.2 rounded-[4px] bg-[#EFF6FC] text-[#0078D4] border border-[#C7E0F4]">
                                                                                    <span>⏱ {{ $cls->continuation_note ?? 'Continuation Slot' }}</span>
                                                                                </div>
                                                                            @endif

                                                                            <!-- Course Code & Name -->
                                                                            <div class="flex items-start justify-between gap-1 mb-0.5">
                                                                                <div class="min-w-0">
                                                                                    <span class="course-code-text font-bold text-[11.5px] sm:text-[12.5px] text-[#323130] tracking-tight block">
                                                                                        {{ $cls->course_id }}
                                                                                        @if(!empty($cls->section) && $classCount > 1)
                                                                                            <span class="text-[9px] text-[#605E5C] font-normal">({{ $cls->section }})</span>
                                                                                        @endif
                                                                                    </span>
                                                                                    <span class="course-title-text text-[10px] sm:text-[10.5px] font-medium text-[#0078D4] leading-snug block line-clamp-1 sm:line-clamp-2" title="{{ $cls->course_name ?? $cls->course_id }}">
                                                                                        {{ $cls->course_name ?? $cls->course_id }}
                                                                                    </span>
                                                                                </div>
                                                                                @if($cls->major_track)
                                                                                    <span class="shrink-0 text-[8px] font-bold uppercase px-1 py-0.2 rounded-[4px] bg-[#FFF4CE] text-[#8A3707] border border-[#FED9CC]">
                                                                                        {{ $cls->major_track }}
                                                                                    </span>
                                                                                @endif
                                                                            </div>

                                                                            <!-- Faculty Initials & Full Name -->
                                                                            <div class="mb-0.5 text-[9.5px] leading-tight">
                                                                                <div class="flex items-center gap-1 font-semibold text-[#323130]">
                                                                                    <span class="faculty-badge-text px-1 py-0.2 rounded-[4px] bg-[#EFF6FC] text-[#0078D4] font-mono text-[9px] border border-[#C7E0F4] shrink-0 font-bold">
                                                                                        {{ $cls->teacher_initials }}
                                                                                    </span>
                                                                                    <span class="faculty-name-text truncate text-[10px]" title="{{ $cls->teacher_name }} ({{ $cls->teacher_designation }})">
                                                                                        {{ $cls->teacher_name }}
                                                                                    </span>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Classroom & Building -->
                                                                            <div class="flex items-center justify-between text-[9px] pt-0.5 border-t border-[#E1DFDD] text-[#323130]">
                                                                                <span class="room-text inline-flex items-center gap-1 font-bold text-[#107C41] text-[10px]">
                                                                                    <svg class="w-2.5 h-2.5 text-[#107C41]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                                                                    Room {{ $cls->classroom_no }}
                                                                                </span>
                                                                                <span class="building-text text-[#605E5C] text-[8.5px] font-mono">
                                                                                    {{ $cls->building }}
                                                                                </span>
                                                                            </div>

                                                                            <!-- Quick Actions (Hidden in Image Export & Print) -->
                                                                            <div class="no-print mt-1 pt-0.5 flex items-center justify-between border-t border-[#E1DFDD]">
                                                                                <form method="POST" action="{{ route('custom.toggle') }}" class="custom-toggle-form">
                                                                                    @csrf
                                                                                    <input type="hidden" name="slot_id" value="{{ $cls->id }}">
                                                                                    <button type="submit" class="text-[9px] font-semibold inline-flex items-center gap-1 transition {{ $isCustom ? 'text-[#A80000] hover:underline' : 'text-[#605E5C] hover:text-[#0078D4]' }}">
                                                                                        @if($isCustom)
                                                                                            <span>✓ Added</span>
                                                                                        @else
                                                                                            <span>+ Custom</span>
                                                                                        @endif
                                                                                    </button>
                                                                                </form>
                                                                                <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $cls->teacher_initials]) }}" class="text-[9px] font-semibold text-[#0078D4] hover:underline">
                                                                                    Faculty &rarr;
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                @if($day === 'Friday')
                                                                    <!-- Clean Weekend Cell (Allocates Minimal Blank Area) -->
                                                                    <div class="weekend-cell h-full min-h-[38px] rounded-[4px] border border-dashed border-[#E1DFDD] bg-[#FAF9F8] flex flex-col items-center justify-center py-1.5 px-1.5 text-[#8A8886] select-none">
                                                                        <span class="text-[9.5px] font-semibold text-[#8A8886]">Weekend</span>
                                                                    </div>
                                                                @else
                                                                    <!-- Clean Free Slot indicator (Allocates Minimal Blank Area) -->
                                                                    <a href="{{ route('routine.index', ['tab' => 'custom']) }}" title="Free Slot — Click to browse and add courses in Custom Routine Builder" class="free-slot h-full min-h-[38px] rounded-[4px] border border-dashed border-[#E1DFDD] bg-[#FAF9F8] hover:border-[#0078D4] hover:bg-[#EFF6FC] transition flex flex-col items-center justify-center py-1.5 px-1 text-[#8A8886] hover:text-[#0078D4] cursor-pointer group select-none">
                                                                        <span class="text-[9.5px] font-medium text-[#A19F9D] group-hover:hidden">—</span>
                                                                        <span class="text-[9px] font-semibold text-[#0078D4] hidden group-hover:inline-flex items-center gap-1">
                                                                            <svg class="w-2.5 h-2.5 text-[#0078D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                                                            <span>+ Add</span>
                                                                        </span>
                                                                    </a>
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
                                    <section class="routine-day-section overflow-hidden rounded-[4px] border border-[#E1DFDD] bg-white shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)] transition-all" data-day="{{ $dayName }}">
                                        <div class="border-b border-[#E1DFDD] bg-[#FAF9F8] px-4 py-3 flex items-center justify-between">
                                            <h3 class="text-sm font-bold uppercase tracking-wider text-[#323130] flex items-center gap-2">
                                                <svg class="w-4 h-4 text-[#0078D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                <span>{{ $dayName }}</span>
                                                @if(date('l') === $dayName)
                                                    <span class="px-2 py-0.5 rounded text-[10px] bg-[#107C41] text-white font-bold uppercase">Today</span>
                                                @endif
                                            </h3>
                                            <span class="text-xs font-semibold text-[#0078D4] bg-[#EFF6FC] px-2.5 py-0.5 rounded-[4px] border border-[#C7E0F4]">
                                                {{ $slots->count() }} {{ \Illuminate\Support\Str::plural('Class', $slots->count()) }}
                                            </span>
                                        </div>
                                        <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3.5">
                                            @foreach($slots as $slot)
                                                @php
                                                    $isCustom = in_array($slot->id, $customSlotIds);
                                                @endphp
                                                <article class="course-card has-fluent-callout rounded-[4px] border border-[#E1DFDD] border-l-4 border-l-[#0078D4] bg-white p-3.5 hover:shadow-[0_3.2px_7.2px_0_rgba(0,0,0,0.132)] transition-all cursor-pointer"
                                                         data-course-id="{{ $slot->course_id }}"
                                                         data-course-name="{{ $slot->course_name ?? $slot->course_id }}"
                                                         data-teacher-name="{{ $slot->teacher_name }}"
                                                         data-teacher-initials="{{ $slot->teacher_initials }}"
                                                         data-teacher-designation="{{ $slot->teacher_designation }}"
                                                         data-room="{{ $slot->classroom_no }}"
                                                         data-building="{{ $slot->building }}"
                                                         data-batch="{{ $slot->batch }}"
                                                         data-section="{{ $slot->section }}"
                                                         data-track="{{ $slot->major_track ?? '' }}"
                                                         data-day="{{ $dayName }}"
                                                         data-slot="{{ $slot->start_time_formatted ?? '' }}"
                                                         data-slot-id="{{ $slot->id }}"
                                                         data-is-custom="{{ $isCustom ? '1' : '0' }}">
                                                    <div class="flex items-center justify-between text-xs font-mono font-bold text-[#0078D4] pb-2 border-b border-[#E1DFDD]">
                                                        <span>{{ $slot->start_time_formatted ?? date('h:i A', strtotime($slot->start_time)) }} — {{ $slot->end_time_formatted ?? date('h:i A', strtotime($slot->end_time)) }}</span>
                                                        @if($slot->major_track)
                                                            <span class="px-1.5 py-0.2 rounded-[4px] text-[10px] bg-[#FFF4CE] text-[#8A3707] border border-[#FED9CC] uppercase font-sans font-bold">
                                                                {{ $slot->major_track }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="mt-2.5">
                                                        <h4 class="text-lg font-bold text-[#323130] tracking-tight">
                                                            {{ $slot->course_id }}
                                                            @if(!empty($slot->section))
                                                                <span class="text-xs text-[#605E5C] font-normal font-sans">({{ $slot->section }})</span>
                                                            @endif
                                                        </h4>
                                                        @if(!empty($slot->course_name))
                                                            <p class="text-xs font-medium text-[#0078D4] mt-0.5">{{ $slot->course_name }}</p>
                                                        @endif
                                                        <div class="mt-2.5 space-y-1 text-xs text-[#323130]">
                                                            <div class="flex items-center gap-2">
                                                                <span class="px-1.5 py-0.2 rounded-[4px] bg-[#EFF6FC] text-[#0078D4] font-mono text-[10px] font-bold border border-[#C7E0F4]">
                                                                    {{ $slot->teacher_initials }}
                                                                </span>
                                                                <span class="font-semibold text-[#323130]">{{ $slot->teacher_name }}</span>
                                                            </div>
                                                            <p class="text-[11px] text-[#605E5C] pl-0.5">{{ $slot->teacher_designation }}</p>
                                                            <div class="flex items-center justify-between pt-2 border-t border-[#E1DFDD] text-[#323130]">
                                                                <span class="font-bold text-[#107C41] flex items-center gap-1">
                                                                    <svg class="w-3.5 h-3.5 text-[#107C41]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                                                    Room {{ $slot->classroom_no }}
                                                                </span>
                                                                <span class="text-xs font-mono text-[#605E5C]">{{ $slot->building }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="no-print mt-3 pt-2 flex items-center justify-between border-t border-[#E1DFDD]">
                                                        <form method="POST" action="{{ route('custom.toggle') }}">
                                                            @csrf
                                                            <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                                                            <button type="submit" class="text-xs font-semibold transition {{ $isCustom ? 'text-[#A80000] hover:underline' : 'text-[#605E5C] hover:text-[#0078D4]' }}">
                                                                {{ $isCustom ? '✓ In Custom Routine' : '+ Add to Custom' }}
                                                            </button>
                                                        </form>
                                                        <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $slot->teacher_initials]) }}" class="text-xs font-semibold text-[#0078D4] hover:underline">
                                                            Faculty Schedule &rarr;
                                                        </a>
                                                    </div>
                                                </article>
                                            @endforeach
                                        </div>
                                    </section>
                                @empty
                                    <div class="rounded-[4px] border border-dashed border-[#E1DFDD] bg-white p-12 text-center text-[#605E5C]">
                                        <p class="text-base font-bold text-[#323130]">No routine classes found for Batch {{ $batch }} - Section {{ $section }}.</p>
                                        <p class="text-xs text-[#A19F9D] mt-1">Try switching to another section or clearing major track filters.</p>
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
                        <!-- Faculty Search Card (Microsoft Fluent Card) -->
                        <div class="bg-white border border-[#E1DFDD] rounded-[4px] p-5 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)] relative">
                            <div class="max-w-3xl">
                                <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-[4px] bg-[#EFF6FC] text-[#0078D4] text-xs font-semibold mb-2.5 border border-[#C7E0F4]">
                                    <svg class="w-3.5 h-3.5 text-[#0078D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    Faculty Identification & Schedule Ledger
                                </div>
                                <h2 class="text-xl font-bold text-[#323130]">Department Faculty Schedules & Directory</h2>
                                <p class="text-[#605E5C] text-xs sm:text-sm mt-1">
                                    Search any faculty member by their initial (e.g., <strong class="text-[#0078D4]">MRA, MAK, IM, AAA</strong>) or full name to view their complete weekly routine.
                                </p>
                            </div>

                            <!-- Search Form -->
                            <form method="GET" action="{{ route('routine.index') }}" class="mt-5 flex flex-col sm:flex-row gap-3">
                                <input type="hidden" name="tab" value="faculty">
                                <div class="relative flex-1">
                                    <input type="text" name="faculty_initials" value="{{ $facultyQuery }}" placeholder="Enter initials (e.g. MRA) or full name (e.g. Ashek / Abdul Kader)..." class="w-full bg-white border border-[#E1DFDD] rounded-[4px] px-3.5 py-2 text-[#323130] font-medium placeholder:text-[#A19F9D] focus:outline-none focus:border-[#0078D4] focus:ring-1 focus:ring-[#0078D4] transition text-sm">
                                </div>
                                <button type="submit" class="bg-[#0078D4] hover:bg-[#106EBE] text-white font-semibold px-5 py-2 rounded-[4px] transition shadow-xs text-sm flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    <span>Find Schedule</span>
                                </button>
                            </form>

                            <!-- Quick Click Faculty Chips -->
                            <div class="mt-4 pt-3.5 border-t border-[#E1DFDD]">
                                <span class="text-xs font-semibold text-[#605E5C] uppercase tracking-wider mr-2">Quick Access Teachers:</span>
                                <div class="inline-flex flex-wrap gap-1.5 mt-2">
                                    @foreach($popularFaculty->take(16) as $init)
                                        @php $f = App\Services\FacultyService::getFaculty($init); @endphp
                                        <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $init]) }}" class="px-2.5 py-1 rounded-[4px] text-xs font-semibold transition border {{ $facultyQuery === $init ? 'bg-[#0078D4] text-white border-[#0078D4] font-bold shadow-xs' : 'bg-white text-[#323130] hover:bg-[#EDEBE9] border-[#E1DFDD]' }}" title="{{ $f['name'] }} ({{ $f['designation'] }})">
                                            {{ $init }} <span class="text-[10px] text-[#605E5C] font-normal hidden sm:inline">• {{ Str::limit($f['name'], 14) }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Searched Faculty Schedule Display -->
                        @if(!empty($facultyQuery))
                            <div class="bg-white border border-[#E1DFDD] rounded-[4px] p-5 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)] space-y-5">
                                <!-- Faculty Profile Header -->
                                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-4 border-b border-[#E1DFDD]">
                                    <div class="flex items-center gap-3.5">
                                        <div class="w-12 h-12 rounded-[4px] bg-[#0078D4] flex items-center justify-center text-white font-bold text-lg font-mono shadow-xs">
                                            {{ $facultyQuery }}
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-[#323130]">{{ $facultyInfo['name'] ?? $facultyQuery }}</h3>
                                            <p class="text-xs font-semibold text-[#0078D4]">{{ $facultyInfo['designation'] ?? 'Department Faculty' }}</p>
                                            <p class="text-xs text-[#605E5C] mt-0.5">Software Engineering Department • Daffodil International University</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-[#0078D4] font-mono">{{ $facultyRoutines->flatten(1)->count() }}</div>
                                        <div class="text-xs font-semibold text-[#605E5C] uppercase tracking-wider">Weekly Classes</div>
                                    </div>
                                </div>

                                <!-- Teacher Routine Action & Download Toolbar -->
                                <div class="flex flex-wrap items-center justify-between gap-3 bg-[#FAF9F8] border border-[#E1DFDD] rounded-[4px] px-3.5 py-2.5">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-semibold text-[#323130]">View Format:</span>
                                        <div class="inline-flex rounded-[4px] bg-[#F3F2F1] p-0.5 border border-[#E1DFDD] text-xs font-semibold">
                                            <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $facultyQuery, 'faculty_view_mode' => 'grid']) }}" class="px-2.5 py-1 rounded-[4px] transition {{ ($facultyViewMode ?? 'grid') === 'grid' ? 'bg-[#0078D4] text-white font-semibold shadow-xs' : 'text-[#605E5C] hover:text-[#323130]' }}">
                                                Timetable Grid
                                            </a>
                                            <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $facultyQuery, 'faculty_view_mode' => 'cards']) }}" class="px-2.5 py-1 rounded-[4px] transition {{ ($facultyViewMode ?? 'grid') === 'cards' ? 'bg-[#0078D4] text-white font-semibold shadow-xs' : 'text-[#605E5C] hover:text-[#323130]' }}">
                                                Day Cards
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Download Teacher Routine Options -->
                                    <div class="no-print flex items-center flex-wrap gap-2">
                                        <!-- Add to Microsoft Outlook / Teams (.ics) -->
                                        <a href="{{ route('routine.export.ics', ['faculty_initials' => $facultyQuery]) }}" title="Download RFC-5545 iCalendar for Microsoft Outlook & Teams" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-[4px] bg-[#0078D4] hover:bg-[#106EBE] text-white text-xs font-semibold shadow-xs transition">
                                            <svg class="w-3.5 h-3.5 text-white shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            <span>Add to Outlook (.ics)</span>
                                        </a>

                                        <!-- Download Image (PNG) -->
                                        <button type="button" onclick="exportRoutineImage('facultyWeeklyRoutineContainer', 'DIU_SWE_Teacher_{{ $facultyQuery }}_Weekly_Routine_A4_Landscape')" title="Download teacher routine as high-resolution PNG image" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-[4px] bg-white hover:bg-[#EDEBE9] text-[#323130] border border-[#E1DFDD] text-xs font-semibold shadow-xs transition">
                                            <svg class="w-3.5 h-3.5 text-[#0078D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                            <span>Download Image</span>
                                        </button>

                                        <!-- Download CSV -->
                                        <a href="{{ route('routine.export.csv', ['faculty_initials' => $facultyQuery]) }}" title="Download well-formatted CSV spreadsheet matching the image structure" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-[4px] bg-[#DFF6DD] hover:bg-[#C7E0C7] text-[#107C41] border border-[#9FD89F] text-xs font-semibold transition shadow-xs">
                                            <svg class="w-3.5 h-3.5 text-[#107C41]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                            <span>Download CSV</span>
                                        </a>
                                    </div>
                                </div>

                                {{-- OPTION A: TEACHER WEEKLY TIMETABLE GRID (OUTLOOK LOOK: TIME ROWS x SAT-FRI COLUMNS) --}}
                                @if(($facultyViewMode ?? 'grid') === 'grid')
                                    <div id="facultyWeeklyRoutineContainer" class="rounded-[4px] border border-[#E1DFDD] bg-white shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)] p-0 overflow-hidden">
                                        <!-- Header for Landscape Display and High-Res Image Export (Clean Logo, No Cutouts) -->
                                        <div class="px-4 py-3 bg-[#0078D4] text-white flex items-center justify-between border-b border-[#106EBE]">
                                            <div class="flex items-center gap-3">
                                                <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="DIU SWE Logo" class="h-9 w-auto max-w-[56px] object-contain shrink-0 drop-shadow-sm">
                                                <div>
                                                    <div class="text-sm font-bold tracking-wide flex items-center gap-1.5 text-white">
                                                        <span>Daffodil International University</span>
                                                        <span class="text-[#EFF6FC]">•</span>
                                                        <span class="text-white">Dept of SWE</span>
                                                    </div>
                                                    <div class="text-[11px] text-[#EFF6FC] font-medium">
                                                        Faculty Weekly Routine • {{ $facultyInfo['name'] ?? $facultyQuery }} ({{ $facultyQuery }}) • {{ $facultyInfo['designation'] ?? 'Department Faculty' }} • Fall 2026
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right text-[10px] leading-tight">
                                                <div class="font-mono text-white font-bold">{{ $facultyRoutines->flatten(1)->count() }} Classes / Week</div>
                                                <div class="text-[#EFF6FC] text-[9.5px]">Ashulia Smart City (DSC) • A4 Landscape</div>
                                            </div>
                                        </div>

                                        <div class="overflow-x-auto shadow-inner">
                                            <table class="w-full border-collapse text-left text-xs print-table" style="table-layout: fixed; min-width: 1080px; width: 100%;">
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
                                                    <tr class="routine-grid-header bg-[#0078D4] text-white border-b border-[#106EBE] sticky top-0 z-20 shadow-xs">
                                                        <th class="p-2 sm:p-2.5 font-bold uppercase tracking-wider text-white border-r border-[#106EBE] text-center sticky left-0 z-30 bg-[#0078D4] shadow-[2px_0_4px_-1px_rgba(0,0,0,0.12)]">
                                                            <div>Time</div>
                                                            <div class="text-[9px] font-normal text-[#EFF6FC]">Slots</div>
                                                        </th>
                                                        <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#106EBE]">
                                                            <div class="text-white font-bold text-xs uppercase tracking-wide">Saturday</div>
                                                            <div class="text-[9.5px] font-medium text-[#EFF6FC]">Sat</div>
                                                        </th>
                                                        <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#106EBE]">
                                                            <div class="text-white font-bold text-xs uppercase tracking-wide">Sunday</div>
                                                            <div class="text-[9.5px] font-medium text-[#EFF6FC]">Sun</div>
                                                        </th>
                                                        <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#106EBE]">
                                                            <div class="text-white font-bold text-xs uppercase tracking-wide">Monday</div>
                                                            <div class="text-[9.5px] font-medium text-[#EFF6FC]">Mon</div>
                                                        </th>
                                                        <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#106EBE]">
                                                            <div class="text-white font-bold text-xs uppercase tracking-wide">Tuesday</div>
                                                            <div class="text-[9.5px] font-medium text-[#EFF6FC]">Tue</div>
                                                        </th>
                                                        <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#106EBE]">
                                                            <div class="text-white font-bold text-xs uppercase tracking-wide">Wednesday</div>
                                                            <div class="text-[9.5px] font-medium text-[#EFF6FC]">Wed</div>
                                                        </th>
                                                        <th class="p-2 sm:p-2.5 font-bold text-center border-r border-[#106EBE]">
                                                            <div class="text-white font-bold text-xs uppercase tracking-wide">Thursday</div>
                                                            <div class="text-[9.5px] font-medium text-[#EFF6FC]">Thu</div>
                                                        </th>
                                                        <th class="p-2 sm:p-2.5 font-bold text-center">
                                                            <div class="text-white font-bold text-xs uppercase tracking-wide">Friday</div>
                                                            <div class="text-[9.5px] font-medium text-[#EFF6FC]">Fri</div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-[#E1DFDD] bg-white">
                                                    @php
                                                        $orderedDays = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                                                    @endphp
                                                    @foreach($timeSlots as $slot)
                                                        <tr class="hover:bg-[#FAF9F8] transition-colors">
                                                            <!-- Time Slot Header Cell -->
                                                            <td class="p-1 sm:p-1.5 bg-[#F3F2F1] border-r border-[#E1DFDD] align-top text-center sticky left-0 z-10 shadow-[2px_0_4px_-1px_rgba(0,0,0,0.06)]">
                                                                <div class="flex flex-col items-center justify-center py-0.5">
                                                                    <span class="text-xs font-bold text-[#0078D4] font-mono tracking-tight whitespace-nowrap">
                                                                        {{ !empty($slot['start']) ? date('h:i A', strtotime($slot['start'])) : explode('-', $slot['short'] ?? '')[0] }}
                                                                    </span>
                                                                    <span class="text-[8.5px] font-semibold text-[#8A8886] uppercase tracking-wider my-0.5">to</span>
                                                                    <span class="text-xs font-bold text-[#323130] font-mono tracking-tight whitespace-nowrap">
                                                                        {{ !empty($slot['end']) ? date('h:i A', strtotime($slot['end'])) : (explode('-', $slot['short'] ?? '')[1] ?? '') }}
                                                                    </span>
                                                                </div>
                                                            </td>

                                                            <!-- 7 Academic Day Columns -->
                                                            @foreach($orderedDays as $day)
                                                                @php
                                                                    $slotClasses = $facultyWeeklyGrid[$day][$slot['label']] ?? [];
                                                                @endphp
                                                                <td class="p-1 sm:p-1.5 border-r border-[#E1DFDD] last:border-r-0 align-top">
                                                                    @if(!empty($slotClasses))
                                                                        <div class="space-y-1">
                                                                            @foreach($slotClasses as $cls)
                                                                                <div class="course-card has-fluent-callout group relative rounded-[4px] border border-[#E1DFDD] border-l-4 border-l-[#0078D4] bg-white p-1.5 sm:p-2 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)] hover:shadow-[0_3.2px_7.2px_0_rgba(0,0,0,0.132)] transition-all print-card cursor-pointer"
                                                                                     data-course-id="{{ $cls->course_id }}"
                                                                                     data-course-name="{{ $cls->course_name ?? $cls->course_id }}"
                                                                                     data-teacher-name="{{ $cls->teacher_name }}"
                                                                                     data-teacher-initials="{{ $cls->teacher_initials }}"
                                                                                     data-teacher-designation="{{ $cls->teacher_designation }}"
                                                                                     data-room="{{ $cls->classroom_no }}"
                                                                                     data-building="{{ $cls->building }}"
                                                                                     data-batch="{{ $cls->batch }}"
                                                                                     data-section="{{ $cls->section }}"
                                                                                     data-track="{{ $cls->major_track ?? '' }}"
                                                                                     data-day="{{ $day }}"
                                                                                     data-slot="{{ $slot['label'] }}"
                                                                                     data-slot-id="{{ $cls->id }}"
                                                                                     data-is-custom="0">
                                                                                    @if(!empty($cls->is_continuation))
                                                                                        <div class="mb-0.5 inline-flex items-center gap-1 text-[7.5px] font-semibold px-1 py-0.2 rounded-[4px] bg-[#EFF6FC] text-[#0078D4] border border-[#C7E0F4]">
                                                                                            <span>⏱ {{ $cls->continuation_note ?? 'Continuation Slot' }}</span>
                                                                                        </div>
                                                                                    @endif

                                                                                    <!-- Course Code & Batch Badge -->
                                                                                    <div class="flex items-start justify-between gap-1 mb-0.5">
                                                                                        <div class="min-w-0">
                                                                                            <span class="course-code-text font-bold text-[11px] sm:text-xs text-[#323130] tracking-tight block">
                                                                                                {{ $cls->course_id }}
                                                                                            </span>
                                                                                            <span class="course-title-text text-[9.5px] font-medium text-[#0078D4] leading-tight block line-clamp-1 sm:line-clamp-2" title="{{ $cls->course_name ?? $cls->course_id }}">
                                                                                                {{ $cls->course_name ?? $cls->course_id }}
                                                                                            </span>
                                                                                        </div>
                                                                                        <span class="shrink-0 text-[8px] font-bold uppercase px-1 py-0.2 rounded-[4px] bg-[#EFF6FC] text-[#0078D4] border border-[#C7E0F4]">
                                                                                            B{{ $cls->batch }}-{{ $cls->section }}
                                                                                        </span>
                                                                                    </div>

                                                                                    <!-- Classroom & Building -->
                                                                                    <div class="flex items-center justify-between text-[9px] pt-0.5 border-t border-[#E1DFDD] text-[#323130]">
                                                                                        <span class="room-text inline-flex items-center gap-1 font-bold text-[#107C41]">
                                                                                            <svg class="w-2.5 h-2.5 text-[#107C41]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                                                                            Room {{ $cls->classroom_no }}
                                                                                        </span>
                                                                                        <span class="building-text text-[#605E5C] text-[8px] font-mono">
                                                                                            {{ $cls->building }}
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @else
                                                                        @if($day === 'Friday')
                                                                            <!-- Clean Weekend Cell -->
                                                                            <div class="weekend-cell h-full min-h-[34px] sm:min-h-[36px] rounded-[4px] border border-dashed border-[#E1DFDD] bg-[#FAF9F8] flex flex-col items-center justify-center py-1 px-1.5 text-[#8A8886] select-none">
                                                                                <span class="text-[9px] font-semibold text-[#8A8886]">Weekend</span>
                                                                            </div>
                                                                        @else
                                                                            <!-- Clean Free Slot indicator (Minimal Blank Area) -->
                                                                            <div class="free-slot h-full min-h-[34px] sm:min-h-[36px] rounded-[4px] border border-dashed border-[#E1DFDD] bg-[#FAF9F8] flex flex-col items-center justify-center py-1 px-1 text-[#8A8886] select-none">
                                                                                <span class="text-[9px] font-medium text-[#A19F9D]">—</span>
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
                                    {{-- OPTION B: CLASS SLOTS BY DAY CARDS --}}
                                    <div class="space-y-4">
                                        @forelse($facultyRoutines as $day => $classes)
                                            <div class="rounded-[4px] border border-[#E1DFDD] overflow-hidden">
                                                <div class="bg-[#FAF9F8] px-4 py-2 flex items-center justify-between border-b border-[#E1DFDD]">
                                                    <span class="font-bold text-[#323130] text-xs uppercase tracking-wider">{{ $day }}</span>
                                                    <span class="text-xs font-mono text-[#605E5C]">{{ $classes->count() }} slots</span>
                                                </div>
                                                <div class="p-3.5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                                    @foreach($classes as $c)
                                                        <div class="course-card has-fluent-callout p-3 rounded-[4px] border border-[#E1DFDD] border-l-4 border-l-[#0078D4] bg-white shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)] hover:shadow-[0_3.2px_7.2px_0_rgba(0,0,0,0.132)] transition-all cursor-pointer"
                                                             data-course-id="{{ $c->course_id }}"
                                                             data-course-name="{{ $c->course_name ?? $c->course_id }}"
                                                             data-teacher-name="{{ $c->teacher_name }}"
                                                             data-teacher-initials="{{ $c->teacher_initials }}"
                                                             data-teacher-designation="{{ $c->teacher_designation }}"
                                                             data-room="{{ $c->classroom_no }}"
                                                             data-building="{{ $c->building }}"
                                                             data-batch="{{ $c->batch }}"
                                                             data-section="{{ $c->section }}"
                                                             data-day="{{ $day }}"
                                                             data-slot="{{ date('h:i A', strtotime($c->start_time)) }} - {{ date('h:i A', strtotime($c->end_time)) }}"
                                                             data-slot-id="{{ $c->id }}"
                                                             data-is-custom="0">
                                                            <div class="flex items-center justify-between text-xs font-mono font-bold text-[#0078D4] mb-1">
                                                                <span>{{ date('h:i A', strtotime($c->start_time)) }} - {{ date('h:i A', strtotime($c->end_time)) }}</span>
                                                                <span class="px-1.5 py-0.2 rounded-[4px] bg-[#EFF6FC] text-[#0078D4] font-sans text-[10px] font-bold">
                                                                    Batch {{ $c->batch }}-{{ $c->section }}
                                                                </span>
                                                            </div>
                                                            <h5 class="text-sm font-bold text-[#323130]">{{ $c->course_id }}</h5>
                                                            @if(!empty($c->course_name))
                                                                <p class="text-xs font-medium text-[#0078D4] mt-0.5">{{ $c->course_name }}</p>
                                                            @endif
                                                            <div class="mt-2 text-xs flex items-center justify-between text-[#323130] pt-1.5 border-t border-[#E1DFDD]">
                                                                <span class="text-[#107C41] font-bold">Room: {{ $c->classroom_no }}</span>
                                                                <span class="text-[#605E5C] font-mono text-[10px]">{{ $c->building }}</span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @empty
                                            <div class="p-8 text-center text-[#605E5C]">
                                                No scheduled routine classes found for initial <strong>{{ $facultyQuery }}</strong>.
                                            </div>
                                        @endforelse
                                    </div>
                                @endif
                            </div>
                        @endif

                        <!-- Full Faculty Directory Table (Microsoft Fluent Table) -->
                        <div class="bg-white border border-[#E1DFDD] rounded-[4px] p-5 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)]">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-4">
                                <div>
                                    <h3 class="text-base font-bold text-[#323130]">Full Faculty Directory ({{ count($facultyDirectory) }} Members)</h3>
                                    <p class="text-xs text-[#605E5C]">Official names and designations matching the Fall 2026 Academic Routine document.</p>
                                </div>
                                <input type="text" id="facultyFilterInput" onkeyup="filterFacultyTable()" placeholder="Quick filter faculty table..." class="bg-white border border-[#E1DFDD] rounded-[4px] px-3 py-1.5 text-xs text-[#323130] placeholder:text-[#A19F9D] focus:outline-none focus:border-[#0078D4] focus:ring-1 focus:ring-[#0078D4] w-full sm:w-64">
                            </div>

                            <div class="overflow-x-auto">
                                <table id="facultyTable" class="w-full text-left text-xs sm:text-sm divide-y divide-[#E1DFDD]">
                                    <thead>
                                        <tr class="text-[#323130] font-bold text-xs uppercase tracking-wider bg-[#F3F2F1]">
                                            <th class="py-2.5 px-3">Initial</th>
                                            <th class="py-2.5 px-4">Faculty Member Full Name</th>
                                            <th class="py-2.5 px-4">Academic Designation</th>
                                            <th class="py-2.5 px-3 text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#E1DFDD] font-normal bg-white">
                                        @foreach($facultyDirectory as $init => $f)
                                            <tr class="hover:bg-[#FAF9F8] transition">
                                                <td class="py-2.5 px-3 font-mono font-bold text-[#0078D4]">
                                                    <span class="px-1.5 py-0.5 rounded-[4px] bg-[#EFF6FC] border border-[#C7E0F4]">{{ $init }}</span>
                                                </td>
                                                <td class="py-2.5 px-4 text-[#323130] font-semibold">{{ $f['name'] }}</td>
                                                <td class="py-2.5 px-4 text-[#605E5C]">{{ $f['designation'] }}</td>
                                                <td class="py-2.5 px-3 text-right">
                                                    <a href="{{ route('routine.index', ['tab' => 'faculty', 'faculty_initials' => $init]) }}" class="inline-flex items-center gap-1 text-xs font-semibold text-[#0078D4] hover:underline">
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
                        <!-- Filter Bar (Microsoft Fluent Card) -->
                        <div class="bg-white border border-[#E1DFDD] rounded-[4px] p-5 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)]">
                            <div class="max-w-3xl">
                                <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-[4px] bg-[#DFF6DD] text-[#107C41] text-xs font-semibold mb-2.5 border border-[#9FD89F]">
                                    <svg class="w-3.5 h-3.5 text-[#107C41]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Available Classrooms &amp; Labs Tracker
                                </div>
                                <h2 class="text-xl font-bold text-[#323130]">SWE Dedicated Free Room Tracker</h2>
                                <p class="text-[#605E5C] text-xs sm:text-sm mt-1">
                                    Tracks dedicated Software Engineering Department rooms and laboratories in real time. Perfect for group projects, self-study, and lab sessions.
                                </p>
                            </div>

                            <form method="GET" action="{{ route('routine.index') }}" class="mt-5 grid grid-cols-1 sm:grid-cols-3 gap-3.5 items-end">
                                <input type="hidden" name="tab" value="empty_rooms">
                                <div>
                                    <label class="block text-xs font-semibold text-[#323130] mb-1.5">Academic Day</label>
                                    <select name="empty_day" onchange="this.form.submit()" class="w-full bg-white border border-[#E1DFDD] rounded-[4px] px-3 py-2 text-[#323130] font-medium focus:outline-none focus:border-[#0078D4] focus:ring-1 focus:ring-[#0078D4] transition text-xs sm:text-sm">
                                        @foreach($days as $d)
                                            <option value="{{ $d }}" {{ $emptyDay === $d ? 'selected' : '' }}>{{ $d }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-[#323130] mb-1.5">Class Interval</label>
                                    <select name="empty_slot" onchange="this.form.submit()" class="w-full bg-white border border-[#E1DFDD] rounded-[4px] px-3 py-2 text-[#323130] font-medium focus:outline-none focus:border-[#0078D4] focus:ring-1 focus:ring-[#0078D4] transition text-xs sm:text-sm">
                                        @foreach($timeSlots as $slot)
                                            @php $val = $slot['start'].' - '.$slot['end']; @endphp
                                            <option value="{{ $val }}" {{ $emptySlot === $val ? 'selected' : '' }}>
                                                {{ $slot['label'] }} ({{ $slot['short'] ?? '' }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="bg-[#0078D4] hover:bg-[#106EBE] text-white font-semibold px-4 py-2 rounded-[4px] transition shadow-xs text-xs sm:text-sm flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    <span>Inspect Spaces</span>
                                </button>
                            </form>
                        </div>

                        <!-- Real-Time Room Search & Fluent Pill Filters Bar -->
                        <div class="bg-white border border-[#E1DFDD] rounded-[4px] p-3.5 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)] flex flex-wrap items-center justify-between gap-3">
                            <div class="flex items-center flex-wrap gap-2 text-xs font-semibold" id="roomPillContainer">
                                <span class="text-[#605E5C] text-xs font-bold uppercase tracking-wider mr-1">Filter View:</span>
                                <button type="button" onclick="setRoomPillFilter('all', this)" class="room-pill-btn px-3 py-1 rounded-[4px] bg-[#0078D4] text-white font-semibold transition shadow-xs">
                                    All Rooms ({{ count($dedicatedRooms) }})
                                </button>
                                <button type="button" onclick="setRoomPillFilter('free', this)" class="room-pill-btn px-3 py-1 rounded-[4px] bg-[#F3F2F1] text-[#323130] hover:bg-[#EDEBE9] border border-[#E1DFDD] font-semibold transition">
                                    Free Now ({{ $roomAnalysis['available_count'] }})
                                </button>
                                <button type="button" onclick="setRoomPillFilter('annex', this)" class="room-pill-btn px-3 py-1 rounded-[4px] bg-[#F3F2F1] text-[#323130] hover:bg-[#EDEBE9] border border-[#E1DFDD] font-semibold transition">
                                    All Annex
                                </button>
                                <button type="button" onclick="setRoomPillFilter('main', this)" class="room-pill-btn px-3 py-1 rounded-[4px] bg-[#F3F2F1] text-[#323130] hover:bg-[#EDEBE9] border border-[#E1DFDD] font-semibold transition">
                                    Main Campus
                                </button>
                            </div>

                            <div class="w-full sm:w-72 relative">
                                <input type="text" id="roomFilterInput" onkeyup="filterRoomCards()" placeholder="Search room (e.g. 601, AB4, CSE)..." class="w-full bg-white border border-[#E1DFDD] rounded-[4px] px-3 py-1.5 text-xs text-[#323130] placeholder:text-[#A19F9D] focus:outline-none focus:border-[#0078D4] focus:ring-1 focus:ring-[#0078D4] transition">
                            </div>
                        </div>

                        <!-- Stats Counters (Microsoft Fluent Palette) -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3.5">
                            <div class="p-4 rounded-[4px] bg-white border border-[#E1DFDD] shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)]">
                                <div class="text-xs font-semibold text-[#605E5C] uppercase tracking-wider">Total Rooms</div>
                                <div class="text-2xl font-bold text-[#323130] font-mono mt-1">{{ count($dedicatedRooms) }}</div>
                            </div>
                            <div class="p-4 rounded-[4px] bg-[#DFF6DD] border border-[#9FD89F] shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)]">
                                <div class="text-xs font-semibold text-[#107C41] uppercase tracking-wider">Available Free</div>
                                <div class="text-2xl font-bold text-[#107C41] font-mono mt-1">{{ $roomAnalysis['available_count'] }}</div>
                            </div>
                            <div class="p-4 rounded-[4px] bg-[#FFF4CE] border border-[#FED9CC] shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)]">
                                <div class="text-xs font-semibold text-[#8A3707] uppercase tracking-wider">Occupied Rooms</div>
                                <div class="text-2xl font-bold text-[#D83B01] font-mono mt-1">{{ $roomAnalysis['occupied_count'] }}</div>
                            </div>
                            <div class="p-4 rounded-[4px] bg-white border border-[#E1DFDD] shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)]">
                                <div class="text-xs font-semibold text-[#605E5C] uppercase tracking-wider">Availability</div>
                                <div class="text-2xl font-bold text-[#0078D4] font-mono mt-1">
                                    {{ round(($roomAnalysis['available_count'] / count($dedicatedRooms)) * 100) }}%
                                </div>
                            </div>
                        </div>

                        <!-- Room Grid with Fluent Badges and Elevation -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3.5" id="roomsGridContainer">
                            @foreach($roomAnalysis['rooms'] as $rm)
                                @php $isFree = ($rm['status'] === 'Available / Empty'); @endphp
                                <div class="room-card rounded-[4px] border border-[#E1DFDD] border-l-4 {{ $isFree ? 'border-l-[#107C41] bg-white' : 'border-l-[#D83B01] bg-[#FAF9F8]' }} p-4 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)] hover:shadow-[0_3.2px_7.2px_0_rgba(0,0,0,0.132)] transition-all"
                                     data-room-no="{{ $rm['room_no'] }}"
                                     data-building="{{ strtolower($rm['building']) }}"
                                     data-status="{{ $isFree ? 'free' : 'occupied' }}"
                                     data-course="{{ !$isFree && isset($rm['occupied_by']) ? strtolower($rm['occupied_by']['course_id'].' '.$rm['occupied_by']['teacher_name']) : '' }}">
                                    <div class="flex items-center justify-between mb-2.5">
                                        <h4 class="text-lg font-bold text-[#323130] font-mono">{{ $rm['room_no'] }}</h4>
                                        <span class="px-2 py-0.5 rounded-[4px] text-xs font-semibold {{ $isFree ? 'bg-[#DFF6DD] text-[#107C41] border border-[#9FD89F]' : 'bg-[#FED9CC] text-[#8A3707] border border-[#F7630C]' }}">
                                            {{ $isFree ? 'Available' : 'Occupied' }}
                                        </span>
                                    </div>
                                    <div class="text-xs text-[#605E5C]">
                                        <span>Building: <strong class="text-[#323130]">{{ $rm['building'] }}</strong></span>
                                    </div>
                                    @if(!$isFree && isset($rm['occupied_by']))
                                        <div class="mt-2.5 pt-2.5 border-t border-[#E1DFDD] text-xs space-y-1">
                                            <div class="text-[#323130] font-semibold">Class: {{ $rm['occupied_by']['course_id'] }}</div>
                                            <div class="text-[#605E5C]">
                                                Faculty: <strong class="text-[#323130]">{{ $rm['occupied_by']['teacher_name'] }} ({{ $rm['occupied_by']['teacher_initials'] }})</strong>
                                            </div>
                                            <div class="text-[#605E5C] text-[11px]">Batch {{ $rm['occupied_by']['batch'] }} • Sec {{ $rm['occupied_by']['section'] }}</div>
                                        </div>
                                    @else
                                        <div class="mt-2.5 pt-2.5 border-t border-[#DFF6DD] text-[11px] text-[#107C41] font-semibold flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5 text-[#107C41]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            <span>Free for student study group & practice</span>
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
                        <!-- Header Info (Microsoft Fluent Card) -->
                        <div class="bg-white border border-[#E1DFDD] rounded-[4px] p-5 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)]">
                            <div class="max-w-3xl">
                                <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-[4px] bg-[#EFF6FC] text-[#0078D4] text-xs font-semibold mb-2.5 border border-[#C7E0F4]">
                                    <svg class="w-3.5 h-3.5 text-[#0078D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    Retake &amp; Elective Course Organizer
                                </div>
                                <h2 class="text-xl font-bold text-[#323130]">Customizable Routine Builder</h2>
                                <p class="text-[#605E5C] text-xs sm:text-sm mt-1">
                                    Lookup courses across all batches, select your registered sections, and compile an individualized weekly timetable with zero time clashes.
                                </p>
                            </div>

                            <!-- Search Course Input -->
                            <form method="GET" action="{{ route('routine.index') }}" class="mt-5 flex flex-col sm:flex-row gap-3">
                                <input type="hidden" name="tab" value="custom">
                                <div class="relative flex-1">
                                    <input type="text" name="course_search" value="{{ $courseSearch }}" placeholder="Enter Course Code (e.g. SWE112, SE223, MAT101)..." class="w-full bg-white border border-[#E1DFDD] rounded-[4px] px-3.5 py-2 text-[#323130] font-semibold uppercase placeholder:text-[#A19F9D] focus:outline-none focus:border-[#0078D4] focus:ring-1 focus:ring-[#0078D4] transition text-sm">
                                </div>
                                <button type="submit" class="bg-[#0078D4] hover:bg-[#106EBE] text-white font-semibold px-5 py-2 rounded-[4px] transition shadow-xs text-sm flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    <span>Search Slots</span>
                                </button>
                            </form>
                        </div>

                        <!-- Course Search Results Ledger -->
                        @if(!empty($courseSearch))
                            <div class="bg-white border border-[#E1DFDD] rounded-[4px] p-5 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)]">
                                <div class="flex items-center justify-between pb-3.5 border-b border-[#E1DFDD]">
                                    <div>
                                        <h3 class="text-base font-bold text-[#323130]">Search Results for "{{ $courseSearch }}"</h3>
                                        <p class="text-xs text-[#605E5C]">Found <strong class="text-[#0078D4]">{{ $courseSearchResults->flatten(1)->count() }}</strong> available class slots across all batches and sections.</p>
                                    </div>
                                    <a href="{{ route('routine.index', ['tab' => 'custom']) }}" class="text-xs font-semibold text-[#605E5C] hover:text-[#A80000] transition">
                                        Clear Search
                                    </a>
                                </div>
                                <div class="mt-4 space-y-4">
                                    @forelse($courseSearchResults as $dayName => $daySlots)
                                        <div class="rounded-[4px] border border-[#E1DFDD] overflow-hidden">
                                            <div class="bg-[#FAF9F8] px-4 py-2 border-b border-[#E1DFDD] flex items-center justify-between">
                                                <span class="font-bold text-[#323130] text-xs uppercase">{{ $dayName }}</span>
                                                <span class="text-[11px] font-mono text-[#605E5C]">{{ $daySlots->count() }} slots</span>
                                            </div>
                                            <div class="p-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                                @foreach($daySlots as $s)
                                                    @php $isCustom = in_array($s->id, $customSlotIds); @endphp
                                                    <div class="p-3 rounded-[4px] border border-[#E1DFDD] border-l-4 border-l-[#0078D4] bg-white hover:shadow-xs transition">
                                                        <div class="flex items-center justify-between text-xs font-mono font-bold text-[#0078D4] mb-1">
                                                            <span>{{ $s->start_time_formatted }} - {{ $s->end_time_formatted }}</span>
                                                            <span class="px-1.5 py-0.2 rounded-[4px] bg-[#EFF6FC] text-[#0078D4] text-[10px] font-sans font-bold">
                                                                Batch {{ $s->batch }}-{{ $s->section }}
                                                            </span>
                                                        </div>
                                                        <div class="font-bold text-sm text-[#323130]">{{ $s->course_id }}</div>
                                                        <div class="text-xs font-medium text-[#0078D4]">{{ $s->course_name }}</div>
                                                        <div class="mt-1 text-xs text-[#323130]">
                                                            <span class="font-bold">{{ $s->teacher_initials }}</span> • {{ $s->teacher_name }}
                                                        </div>
                                                        <div class="mt-2 flex items-center justify-between text-[11px] text-[#605E5C] pt-1.5 border-t border-[#E1DFDD]">
                                                            <span class="font-bold text-[#107C41]">Room {{ $s->classroom_no }}</span>
                                                            <form method="POST" action="{{ route('custom.toggle') }}">
                                                                @csrf
                                                                <input type="hidden" name="slot_id" value="{{ $s->id }}">
                                                                <button type="submit" class="px-2.5 py-0.5 rounded-[4px] text-xs font-semibold transition {{ $isCustom ? 'bg-[#FED9CC] text-[#A80000] hover:bg-[#FDC3B0]' : 'bg-[#EFF6FC] text-[#0078D4] hover:bg-[#DEECF9]' }}">
                                                                    {{ $isCustom ? '✓ In Custom' : '+ Add to Routine' }}
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @empty
                                        <div class="p-6 text-center text-[#605E5C] text-xs">
                                            No routine slots found matching course code "{{ $courseSearch }}".
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        @endif

                        <!-- Custom Timetable Result Summary (Microsoft Fluent Card) -->
                        <div class="bg-white border border-[#E1DFDD] rounded-[4px] p-5 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)]">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-4 border-b border-[#E1DFDD]">
                                <div>
                                    <h3 class="text-base font-bold text-[#323130]">Your Selected Custom Routine</h3>
                                    <p class="text-xs text-[#605E5C]">Total Selected Slots: <strong class="text-[#0078D4]">{{ count($customSlotIds) }}</strong> classes.</p>
                                </div>
                                @if(count($customSlotIds) > 0)
                                    <div class="flex items-center gap-2">
                                        <button type="button" onclick="exportRoutineImage('customRoutineContainer', 'DIU_SWE_Custom_Student_Routine_A4_Landscape')" class="px-3 py-1.5 rounded-[4px] bg-[#0078D4] hover:bg-[#106EBE] text-xs font-semibold text-white shadow-xs transition flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                            <span>Download Custom Image</span>
                                        </button>
                                        <form method="POST" action="{{ route('custom.clear') }}">
                                            @csrf
                                            <button type="submit" class="px-3 py-1.5 rounded-[4px] bg-white hover:bg-[#EDEBE9] border border-[#E1DFDD] text-xs font-semibold text-[#A80000] transition">
                                                Reset Custom Routine
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>

                            @if(!empty($customHasConflicts) && !empty($customSoftConflicts))
                                <div class="mt-4 ms-messagebar ms-messagebar-warning flex items-start gap-2.5">
                                    <div class="text-[#8A3707] shrink-0 mt-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                    </div>
                                    <div class="text-xs text-[#323130]">
                                        <span class="font-bold">⚡ Scheduling Overlap Detected:</span>
                                        <span>{{ count($customSoftConflicts) }} slot(s) contain concurrent courses. Both courses are preserved and rendered below without data loss.</span>
                                    </div>
                                </div>
                            @elseif(count($customSlotIds) > 0)
                                <div class="mt-4 ms-messagebar ms-messagebar-success flex items-center gap-2.5">
                                    <svg class="w-4 h-4 text-[#107C41]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    <span class="text-xs text-[#107C41] font-semibold">Valid Custom Schedule: Zero hard clashes found across your selected courses.</span>
                                </div>
                            @endif

                            @if(count($customSlotIds) > 0)
                                <!-- Custom Weekly Grid in identical 8-Column A4 Landscape Structure -->
                                <div id="customRoutineContainer" class="mt-5 rounded-[4px] border border-[#E1DFDD] bg-white overflow-hidden shadow-xs">
                                    <div class="px-4 py-2.5 bg-[#0078D4] text-white flex items-center justify-between border-b border-[#106EBE]">
                                        <div class="font-bold text-xs">Custom Student Schedule Matrix (A4 Landscape)</div>
                                        <div class="text-[10px] text-[#EFF6FC]">Dept of SWE • Daffodil International University</div>
                                    </div>
                                    <div class="overflow-x-auto shadow-inner">
                                        <table class="w-full text-left text-xs print-table" style="table-layout: fixed; min-width: 1080px; width: 100%;">
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
                                                <tr class="routine-grid-header bg-[#0078D4] text-white border-b border-[#106EBE] sticky top-0 z-20 shadow-xs">
                                                    <th class="p-2.5 font-bold border-r border-[#106EBE] text-center sticky left-0 z-30 bg-[#0078D4] shadow-[2px_0_4px_-1px_rgba(0,0,0,0.12)]">Time</th>
                                                    <th class="p-2.5 font-bold text-center border-r border-[#106EBE]">Saturday</th>
                                                    <th class="p-2.5 font-bold text-center border-r border-[#106EBE]">Sunday</th>
                                                    <th class="p-2.5 font-bold text-center border-r border-[#106EBE]">Monday</th>
                                                    <th class="p-2.5 font-bold text-center border-r border-[#106EBE]">Tuesday</th>
                                                    <th class="p-2.5 font-bold text-center border-r border-[#106EBE]">Wednesday</th>
                                                    <th class="p-2.5 font-bold text-center border-r border-[#106EBE]">Thursday</th>
                                                    <th class="p-2.5 font-bold text-center">Friday</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-[#E1DFDD] bg-white">
                                                @php
                                                    $orderedDays = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                                                @endphp
                                                @foreach($timeSlots as $slot)
                                                    <tr class="hover:bg-[#FAF9F8]">
                                                        <td class="p-2 bg-[#F3F2F1] border-r border-[#E1DFDD] font-mono text-center text-xs font-bold text-[#323130] sticky left-0 z-10 shadow-[2px_0_4px_-1px_rgba(0,0,0,0.06)]">
                                                            <div class="flex flex-col items-center justify-center py-0.5">
                                                                <span class="text-xs font-bold text-[#0078D4] font-mono tracking-tight whitespace-nowrap">
                                                                    {{ !empty($slot['start']) ? date('h:i A', strtotime($slot['start'])) : explode('-', $slot['short'] ?? '')[0] }}
                                                                </span>
                                                                <span class="text-[8.5px] font-semibold text-[#8A8886] uppercase tracking-wider my-0.5">to</span>
                                                                <span class="text-xs font-bold text-[#323130] font-mono tracking-tight whitespace-nowrap">
                                                                    {{ !empty($slot['end']) ? date('h:i A', strtotime($slot['end'])) : (explode('-', $slot['short'] ?? '')[1] ?? '') }}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        @foreach($orderedDays as $day)
                                                            @php
                                                                $classes = $customWeeklyGrid[$day][$slot['label']] ?? [];
                                                            @endphp
                                                            <td class="p-1.5 border-r border-[#E1DFDD] last:border-r-0 align-top">
                                                                @if(!empty($classes))
                                                                    @if(count($classes) > 1)
                                                                        <div class="mb-1 text-[7.5px] font-bold uppercase px-1 py-0.5 rounded-[4px] bg-[#FED9CC] text-[#8A3707] border border-[#F7630C]">
                                                                            ⚡ {{ count($classes) }} Classes (Concurrent)
                                                                        </div>
                                                                    @endif
                                                                    @foreach($classes as $c)
                                                                        @php
                                                                            $isCustomConflict = count($classes) > 1;
                                                                            $borderLeftClass = $isCustomConflict ? 'border-l-[#D83B01]' : 'border-l-[#0078D4]';
                                                                        @endphp
                                                                        <div class="course-card has-fluent-callout p-2 rounded-[4px] bg-white border border-[#E1DFDD] border-l-4 {{ $borderLeftClass }} mb-1 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)] hover:shadow-[0_3.2px_7.2px_0_rgba(0,0,0,0.132)] transition-all cursor-pointer"
                                                                             data-course-id="{{ $c->course_id }}"
                                                                             data-course-name="{{ $c->course_name ?? $c->course_id }}"
                                                                             data-teacher-name="{{ $c->teacher_name }}"
                                                                             data-teacher-initials="{{ $c->teacher_initials }}"
                                                                             data-teacher-designation="{{ $c->teacher_designation }}"
                                                                             data-room="{{ $c->classroom_no }}"
                                                                             data-building="{{ $c->building }}"
                                                                             data-batch="{{ $c->batch }}"
                                                                             data-section="{{ $c->section }}"
                                                                             data-track="{{ $c->major_track ?? '' }}"
                                                                             data-day="{{ $day }}"
                                                                             data-slot="{{ $slot['label'] }}"
                                                                             data-slot-id="{{ $c->id }}"
                                                                             data-is-custom="1">
                                                                            @if(!empty($c->is_continuation))
                                                                                <div class="text-[7.5px] font-semibold text-[#0078D4] mb-0.5">⏱ Continuation</div>
                                                                            @endif
                                                                            <div class="course-code-text font-bold text-[11px] text-[#323130]">
                                                                                {{ $c->course_id }}
                                                                                @if(!empty($c->section) && count($classes) > 1)
                                                                                    <span class="text-[9px] font-normal text-[#605E5C]">({{ $c->section }})</span>
                                                                                @endif
                                                                            </div>
                                                                            <div class="course-title-text text-[9.5px] font-medium text-[#0078D4] line-clamp-2" title="{{ $c->course_name ?? $c->course_id }}">{{ $c->course_name ?? $c->course_id }}</div>
                                                                            <div class="text-[9px] text-[#323130] mt-0.5">
                                                                                <span class="faculty-badge-text font-bold">{{ $c->teacher_initials }}</span> • <span class="faculty-name-text">{{ $c->teacher_name }}</span>
                                                                            </div>
                                                                            <div class="room-text text-[9px] text-[#107C41] font-semibold mt-0.5">
                                                                                Room {{ $c->classroom_no }} <span class="building-text">({{ $c->building }})</span>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <div class="free-slot h-full min-h-[34px] sm:min-h-[36px] rounded-[4px] border border-dashed border-[#E1DFDD] bg-[#FAF9F8] flex flex-col items-center justify-center py-1 px-1 text-[#8A8886] select-none">
                                                                        <span class="text-[9px] font-medium text-[#A19F9D]">—</span>
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
                        <div class="bg-white border border-[#E1DFDD] rounded-[4px] p-5 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)]">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <div class="max-w-2xl">
                                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-[4px] bg-[#EFF6FC] text-[#0078D4] text-xs font-semibold mb-2 border border-[#C7E0F4]">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                        <span>DIU SWE Academic Offerings</span>
                                    </div>
                                    <h2 class="text-xl font-bold text-[#323130]">Course Offer Directory</h2>
                                    <p class="text-[#605E5C] text-xs sm:text-sm mt-1">
                                        Official departmental course catalog with batch curriculum specifications, credit allocations, and major specialization tracks.
                                    </p>
                                </div>

                                <!-- Summary Counters -->
                                <div class="flex items-center gap-3">
                                    <div class="px-3.5 py-2.5 rounded-[4px] bg-[#F3F2F1] border border-[#E1DFDD] text-center min-w-[90px]">
                                        <div class="text-2xl font-bold text-[#323130]">{{ $offerings->count() }}</div>
                                        <div class="text-[10px] font-semibold text-[#605E5C] uppercase tracking-wider">Courses Listed</div>
                                    </div>
                                    @if($offeringBatch == 41)
                                        <div class="px-3.5 py-2.5 rounded-[4px] bg-[#EFF6FC] border border-[#C7E0F4] text-center min-w-[90px]">
                                            <div class="text-2xl font-bold text-[#0078D4]">5</div>
                                            <div class="text-[10px] font-semibold text-[#0078D4] uppercase tracking-wider">Major Tracks</div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Filter Controls Form -->
                            <form method="GET" action="{{ route('routine.index') }}" class="mt-5 pt-4 border-t border-[#E1DFDD] flex flex-wrap gap-4 items-end">
                                <input type="hidden" name="tab" value="offerings">

                                <!-- Batch Selector -->
                                <div>
                                    <label class="block text-xs font-semibold text-[#323130] mb-1.5">Filter by Batch</label>
                                    <select name="offering_batch" onchange="this.form.submit()" class="bg-white border border-[#E1DFDD] rounded-[4px] px-3 py-2 text-[#323130] font-medium text-xs sm:text-sm focus:border-[#0078D4] focus:ring-1 focus:ring-[#0078D4] focus:outline-none">
                                        @foreach($availableBatches as $b)
                                            <option value="{{ $b }}" {{ $offeringBatch == $b ? 'selected' : '' }}>Batch {{ $b }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Major / Specialization Track Selector (When Batch is 41) -->
                                @if($offeringBatch == 41)
                                    <div>
                                        <label class="block text-xs font-semibold text-[#323130] mb-1.5">Select Major / Track</label>
                                        <select name="offering_track" onchange="this.form.submit()" class="bg-white border border-[#E1DFDD] rounded-[4px] px-3 py-2 text-[#323130] font-medium text-xs sm:text-sm focus:border-[#0078D4] focus:ring-1 focus:ring-[#0078D4] focus:outline-none">
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
                                <div class="mt-3.5 pt-3.5 border-t border-[#E1DFDD]">
                                    <div class="text-[11px] font-bold uppercase tracking-wider text-[#605E5C] mb-2 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-[#0078D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                                        <span>Quick Filter by Major Track:</span>
                                    </div>
                                    <div class="flex flex-wrap gap-1.5">
                                        <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => 41, 'offering_track' => 'ALL']) }}"
                                           class="px-2.5 py-1 rounded-[4px] text-xs font-semibold border transition-all {{ empty($offeringTrack) || $offeringTrack === 'ALL' ? 'bg-[#0078D4] text-white border-[#0078D4] shadow-xs' : 'bg-white text-[#323130] border-[#E1DFDD] hover:bg-[#EDEBE9]' }}">
                                            All Majors (19)
                                        </a>
                                        <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => 41, 'offering_track' => 'SE']) }}"
                                           class="px-2.5 py-1 rounded-[4px] text-xs font-semibold border transition-all {{ $offeringTrack === 'SE' ? 'bg-[#0078D4] text-white border-[#0078D4] shadow-xs' : 'bg-[#EFF6FC] text-[#0078D4] border-[#C7E0F4] hover:bg-[#DEECF9]' }}">
                                            SE • Software Engineering (4)
                                        </a>
                                        <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => 41, 'offering_track' => 'DS']) }}"
                                           class="px-2.5 py-1 rounded-[4px] text-xs font-semibold border transition-all {{ $offeringTrack === 'DS' ? 'bg-[#107C41] text-white border-[#107C41] shadow-xs' : 'bg-[#DFF6DD] text-[#107C41] border-[#9FD89F] hover:bg-[#C7E0C7]' }}">
                                            DS • Data Science (4)
                                        </a>
                                        <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => 41, 'offering_track' => 'ST']) }}"
                                           class="px-2.5 py-1 rounded-[4px] text-xs font-semibold border transition-all {{ $offeringTrack === 'ST' ? 'bg-[#5C2D91] text-white border-[#5C2D91] shadow-xs' : 'bg-[#F2EDF8] text-[#5C2D91] border-[#D1BDED] hover:bg-[#E5DDF3]' }}">
                                            ST • Software Testing (4)
                                        </a>
                                        <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => 41, 'offering_track' => 'RE']) }}"
                                           class="px-2.5 py-1 rounded-[4px] text-xs font-semibold border transition-all {{ $offeringTrack === 'RE' ? 'bg-[#D83B01] text-white border-[#D83B01] shadow-xs' : 'bg-[#FFF4CE] text-[#8A3707] border-[#FED9CC] hover:bg-[#FEE5D8]' }}">
                                            RE • Robotics Engineering (4)
                                        </a>
                                        <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => 41, 'offering_track' => 'CS']) }}"
                                           class="px-2.5 py-1 rounded-[4px] text-xs font-semibold border transition-all {{ $offeringTrack === 'CS' ? 'bg-[#A80000] text-white border-[#A80000] shadow-xs' : 'bg-[#FDE7E9] text-[#A80000] border-[#F4B2B6] hover:bg-[#FCD2D6]' }}">
                                            CS • Cyber Security (3)
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Major-Specific Active Filter Alert Banner (Fluent MessageBar) -->
                        @if($offeringBatch == 41 && !empty($offeringTrack) && $offeringTrack !== 'ALL')
                            <div class="p-3.5 rounded-[4px] border flex flex-col sm:flex-row sm:items-center justify-between gap-3 shadow-xs
                                {{ $offeringTrack === 'SE' ? 'bg-[#EFF6FC] border-[#C7E0F4] text-[#0078D4]' : '' }}
                                {{ $offeringTrack === 'DS' ? 'bg-[#DFF6DD] border-[#9FD89F] text-[#107C41]' : '' }}
                                {{ $offeringTrack === 'ST' ? 'bg-[#F2EDF8] border-[#D1BDED] text-[#5C2D91]' : '' }}
                                {{ $offeringTrack === 'RE' ? 'bg-[#FFF4CE] border-[#FED9CC] text-[#8A3707]' : '' }}
                                {{ $offeringTrack === 'CS' ? 'bg-[#FDE7E9] border-[#F4B2B6] text-[#A80000]' : '' }}">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-[4px] flex items-center justify-center font-bold text-xs text-white shrink-0
                                        {{ $offeringTrack === 'SE' ? 'bg-[#0078D4]' : '' }}
                                        {{ $offeringTrack === 'DS' ? 'bg-[#107C41]' : '' }}
                                        {{ $offeringTrack === 'ST' ? 'bg-[#5C2D91]' : '' }}
                                        {{ $offeringTrack === 'RE' ? 'bg-[#D83B01]' : '' }}
                                        {{ $offeringTrack === 'CS' ? 'bg-[#A80000]' : '' }}">
                                        {{ $offeringTrack }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-xs text-[#323130]">
                                            Showing {{ $offerings->count() }} major-specific courses for {{ $availableTracks[$offeringTrack] ?? $offeringTrack }}
                                        </div>
                                        <div class="text-[11px] text-[#605E5C]">
                                            Batch 41 curriculum specialization requirements & electives
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('routine.index', ['tab' => 'offerings', 'offering_batch' => 41, 'offering_track' => 'ALL']) }}"
                                   class="text-xs font-semibold text-[#0078D4] hover:underline shrink-0 self-start sm:self-center">
                                    Show All Batch 41 Courses &rarr;
                                </a>
                            </div>
                        @endif

                        <!-- Offerings Table Card (Fluent Table) -->
                        <div class="bg-white border border-[#E1DFDD] rounded-[4px] p-5 shadow-[0_1.6px_3.6px_0_rgba(0,0,0,0.132)]">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs sm:text-sm divide-y divide-[#E1DFDD]">
                                    <thead>
                                        <tr class="bg-[#F3F2F1] text-[#323130] font-bold uppercase text-xs">
                                            <th class="py-2.5 px-3">Course Code</th>
                                            <th class="py-2.5 px-3">Course Title</th>
                                            <th class="py-2.5 px-3">Credits</th>
                                            <th class="py-2.5 px-3">Batch</th>
                                            <th class="py-2.5 px-3">Major / Track</th>
                                            <th class="py-2.5 px-3 text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#E1DFDD] bg-white font-medium">
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

            <!-- Bottom Campus Academic Footer -->
            <footer class="no-print mt-auto py-6 px-4 sm:px-6 border-t border-[#E1DFDD] bg-white text-xs text-[#605E5C]">
                <div class="max-w-7xl mx-auto space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pb-4 border-b border-[#EDEBE9]">
                        <!-- Col 1: Academic Identity -->
                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="DIU SWE Routine Organizer Logo" class="h-6 w-auto object-contain shrink-0">
                                <span class="font-extrabold text-sm sm:text-base text-[#323130] tracking-tight">DIU SWE Routine Organizer</span>
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-blue-50 text-[#0078D4] border border-[#C7E0F4] text-[10px] font-semibold">
                                    Fall 2026
                                </span>
                            </div>
                            <p class="text-xs text-[#605E5C] leading-relaxed">
                                Department of Software Engineering • Faculty of Science &amp; Information Technology (FSIT), Daffodil International University, Ashulia Smart City.
                            </p>
                            <div class="text-[11px] text-[#605E5C]">
                                <span>Academic Session: <strong>Fall 2026</strong></span> • <span>Effective: <strong>September 19, 2026</strong></span>
                            </div>
                        </div>

                        <!-- Col 2: Student Quick Access -->
                        <div>
                            <div class="font-bold text-xs uppercase tracking-wider text-[#323130] mb-2">Student Quick Links</div>
                            <ul class="space-y-1.5 text-xs">
                                <li><a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => 49]) }}" class="hover:text-[#0078D4] hover:underline flex items-center gap-1.5"><span class="text-[#0078D4]">›</span> Batch 49 Routine</a></li>
                                <li><a href="{{ route('routine.index', ['tab' => 'routine', 'batch' => 41]) }}" class="hover:text-[#0078D4] hover:underline flex items-center gap-1.5"><span class="text-[#0078D4]">›</span> Batch 41 Specializations</a></li>
                                <li><a href="{{ route('routine.index', ['tab' => 'faculty']) }}" class="hover:text-[#0078D4] hover:underline flex items-center gap-1.5"><span class="text-[#0078D4]">›</span> Faculty Schedule Analyzer</a></li>
                                <li><a href="{{ route('routine.index', ['tab' => 'empty_rooms']) }}" class="hover:text-[#0078D4] hover:underline flex items-center gap-1.5"><span class="text-[#0078D4]">›</span> Empty Classroom &amp; Lab Tracker</a></li>
                                <li><a href="{{ route('routine.index', ['tab' => 'custom']) }}" class="hover:text-[#0078D4] hover:underline flex items-center gap-1.5"><span class="text-[#0078D4]">›</span> Custom Routine Builder</a></li>
                            </ul>
                        </div>

                        <!-- Col 3: Student Export & Help -->
                        <div class="space-y-2">
                            <div class="font-bold text-xs uppercase tracking-wider text-[#323130] mb-2">Export &amp; Schedule Tools</div>
                            <p class="text-xs text-[#605E5C] leading-relaxed">
                                Download your batch or custom timetable for offline access, or import directly into your calendar.
                            </p>
                            <div class="flex flex-wrap items-center gap-2 pt-1">
                                <a href="{{ route('routine.export.ics', ['batch' => $batch, 'section' => $section, 'major_track' => $track]) }}" class="px-2.5 py-1.5 rounded-[4px] bg-[#0078D4] hover:bg-[#106EBE] text-white text-xs font-semibold transition flex items-center gap-1.5 shadow-2xs">
                                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span>Sync Calendar (.ics)</span>
                                </a>
                                <button type="button" onclick="exportRoutineImage('weeklyRoutineContainer', 'DIU_SWE_Batch_{{ $batch }}_{{ $section }}_Weekly_Routine_A4_Landscape')" class="px-2.5 py-1.5 rounded-[4px] bg-white hover:bg-[#EDEBE9] text-[#323130] border border-[#E1DFDD] text-xs font-semibold transition flex items-center gap-1.5 shadow-2xs cursor-pointer">
                                    <svg class="w-3.5 h-3.5 text-[#0078D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    <span>Download Image</span>
                                </button>
                                <button type="button" onclick="openAboutModal()" class="px-2.5 py-1.5 rounded-[4px] bg-[#FAF9F8] hover:bg-[#EDEBE9] text-[#0078D4] border border-[#C7E0F4] text-xs font-semibold transition flex items-center gap-1.5 cursor-pointer">
                                    <svg class="w-3.5 h-3.5 text-[#0078D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>Student Guide</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Academic Copyright Bar -->
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-2 text-[11px] text-[#605E5C]">
                        <div>
                            &copy; {{ date('Y') }} <strong>Department of Software Engineering</strong> • Daffodil International University (DIU).
                        </div>
                        <div class="text-[10px] text-[#8A8886]">
                            Ashulia Smart City Campus • All schedules subject to Routine Committee updates
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Fluent Teaching Callout (Quick-Action Hover Popover Card) -->
    <div id="fluentTeachingCallout" class="hidden fixed z-50 w-72 bg-white border border-[#E1DFDD] rounded-[4px] shadow-[0_6.4px_14.4px_0_rgba(0,0,0,0.132),0_1.2px_3.6px_0_rgba(0,0,0,0.108)] p-3 text-xs text-[#323130] transition-opacity duration-150 pointer-events-auto">
        <div class="flex items-start justify-between gap-2 pb-2 border-b border-[#E1DFDD]">
            <div>
                <div id="calloutCourseCode" class="font-bold text-sm text-[#0078D4]"></div>
                <div id="calloutCourseName" class="text-[11px] font-semibold text-[#323130] leading-snug"></div>
            </div>
            <span id="calloutTrackBadge" class="hidden px-1.5 py-0.2 rounded-[4px] text-[9px] font-bold uppercase bg-[#FFF4CE] text-[#8A3707] border border-[#FED9CC]"></span>
        </div>
        <div class="py-2 space-y-1.5 text-[11px]">
            <div class="flex items-center gap-1.5">
                <span class="font-semibold text-[#605E5C]">Faculty:</span>
                <span id="calloutFacultyName" class="font-bold text-[#323130]"></span>
                <span id="calloutFacultyInit" class="px-1 py-0.2 rounded-[4px] bg-[#EFF6FC] text-[#0078D4] font-mono text-[9px] font-bold"></span>
            </div>
            <div id="calloutDesignation" class="text-[10px] text-[#605E5C]"></div>
            <div class="flex items-center justify-between pt-1 border-t border-[#E1DFDD] text-[#323130]">
                <span class="flex items-center gap-1 font-semibold text-[#107C41]">
                    <svg class="w-3 h-3 text-[#107C41]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    <span id="calloutRoom"></span>
                </span>
                <span id="calloutBuilding" class="text-[#605E5C] text-[10px] font-mono"></span>
            </div>
            <div class="flex items-center justify-between text-[10px] text-[#605E5C]">
                <span id="calloutBatchSection"></span>
                <span id="calloutTimeSlot" class="font-mono"></span>
            </div>
        </div>
        <div class="pt-2 border-t border-[#E1DFDD] flex items-center justify-between text-[10px]">
            <a id="calloutFacultyLink" href="#" class="font-semibold text-[#0078D4] hover:underline">
                View Faculty Profile &rarr;
            </a>
            <span class="text-[#A19F9D] font-mono text-[9px]">Fluent Teaching Callout</span>
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

        // Empty Room Tracker: Real-time Pill Filters & Search
        let currentRoomPill = 'all';

        function setRoomPillFilter(pillType, btnEl) {
            currentRoomPill = pillType;
            const buttons = document.querySelectorAll('.room-pill-btn');
            buttons.forEach(b => {
                b.className = 'room-pill-btn px-3 py-1 rounded-[4px] bg-[#F3F2F1] text-[#323130] hover:bg-[#EDEBE9] border border-[#E1DFDD] font-semibold transition';
            });
            if (btnEl) {
                btnEl.className = 'room-pill-btn px-3 py-1 rounded-[4px] bg-[#0078D4] text-white font-semibold transition shadow-xs';
            }
            filterRoomCards();
        }

        function filterRoomCards() {
            const searchInput = document.getElementById('roomFilterInput');
            const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
            const roomCards = document.querySelectorAll('.room-card');

            roomCards.forEach(card => {
                const roomNo = (card.dataset.roomNo || '').toLowerCase();
                const building = (card.dataset.building || '').toLowerCase();
                const status = (card.dataset.status || '').toLowerCase();
                const course = (card.dataset.course || '').toLowerCase();

                let matchesPill = true;
                if (currentRoomPill === 'free') {
                    matchesPill = (status === 'free');
                } else if (currentRoomPill === 'annex') {
                    matchesPill = building.includes('annex') || building.includes('ab4') || building.includes('engineering');
                } else if (currentRoomPill === 'main') {
                    matchesPill = !building.includes('annex') && !building.includes('ab4');
                }

                let matchesSearch = true;
                if (query) {
                    matchesSearch = roomNo.includes(query) || building.includes(query) || course.includes(query);
                }

                if (matchesPill && matchesSearch) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Fluent Teaching Callout (Hover Flyouts) Interaction
        (function initFluentTeachingCallouts() {
            const callout = document.getElementById('fluentTeachingCallout');
            if (!callout) return;

            const codeEl = document.getElementById('calloutCourseCode');
            const nameEl = document.getElementById('calloutCourseName');
            const trackEl = document.getElementById('calloutTrackBadge');
            const facultyNameEl = document.getElementById('calloutFacultyName');
            const facultyInitEl = document.getElementById('calloutFacultyInit');
            const designationEl = document.getElementById('calloutDesignation');
            const roomEl = document.getElementById('calloutRoom');
            const buildingEl = document.getElementById('calloutBuilding');
            const batchSectionEl = document.getElementById('calloutBatchSection');
            const timeSlotEl = document.getElementById('calloutTimeSlot');
            const facultyLinkEl = document.getElementById('calloutFacultyLink');

            let hideTimer = null;

            function showCallout(el) {
                clearTimeout(hideTimer);
                const d = el.dataset;
                if (!d.courseId && !d.teacherName) return;

                codeEl.textContent = d.courseId || '';
                nameEl.textContent = d.courseName || d.courseId || '';

                if (d.track) {
                    trackEl.textContent = d.track;
                    trackEl.classList.remove('hidden');
                } else {
                    trackEl.classList.add('hidden');
                }

                facultyNameEl.textContent = d.teacherName || 'Faculty';
                facultyInitEl.textContent = d.teacherInitials || '';
                designationEl.textContent = d.teacherDesignation || 'Dept. of Software Engineering';
                roomEl.textContent = 'Room ' + (d.room || 'TBD');
                buildingEl.textContent = d.building || 'Ashulia';
                batchSectionEl.textContent = 'Batch ' + (d.batch || '') + ' • Section ' + (d.section || '');
                timeSlotEl.textContent = (d.day ? d.day + ' ' : '') + (d.slot || '');

                if (d.teacherInitials) {
                    facultyLinkEl.href = "{{ route('routine.index') }}?tab=faculty&faculty_initials=" + encodeURIComponent(d.teacherInitials);
                    facultyLinkEl.style.display = '';
                } else {
                    facultyLinkEl.style.display = 'none';
                }

                // Calculate Position
                const rect = el.getBoundingClientRect();
                const calloutWidth = 288; // w-72 = 18rem = 288px
                const calloutHeight = 180;

                let left = rect.left + (rect.width / 2) - (calloutWidth / 2);
                let top = rect.bottom + 8; // default below card

                // Viewport boundaries
                if (left + calloutWidth > window.innerWidth - 10) {
                    left = window.innerWidth - calloutWidth - 12;
                }
                if (left < 10) {
                    left = 10;
                }

                // If overflowing bottom, position above card
                if (top + calloutHeight > window.innerHeight - 10) {
                    top = rect.top - calloutHeight - 8;
                }

                callout.style.left = left + 'px';
                callout.style.top = top + 'px';
                callout.classList.remove('hidden');
            }

            function hideCallout() {
                hideTimer = setTimeout(() => {
                    callout.classList.add('hidden');
                }, 150);
            }

            // Bind to all elements with class .has-fluent-callout
            document.querySelectorAll('.has-fluent-callout').forEach(card => {
                card.addEventListener('mouseenter', () => showCallout(card));
                card.addEventListener('mouseleave', hideCallout);
            });

            callout.addEventListener('mouseenter', () => clearTimeout(hideTimer));
            callout.addEventListener('mouseleave', hideCallout);
        })();

        /**
         * Download Routine as High-Resolution A4 Landscape Image (PNG) with ZERO Cutouts.
         * Refactored with EXPORT-FIX-01, EXPORT-FIX-02, EXPORT-FIX-03, and EXPORT-FIX-04.
         */
        function exportRoutineImage(containerId, filename) {
            const original = document.getElementById(containerId);
            if (!original) {
                alert('Routine table container was not found on this page.');
                return;
            }

            showToast('Preparing high-resolution A4 landscape routine export...', 'info');

            // [EXPORT-FIX-03] Explicit render target width for A4 High-DPI Landscape (1920px)
            const TARGET_WIDTH = 1920;

            // 1. Create an off-screen clone wrapper fixed at explicit render target width
            const cloneWrapper = document.createElement('div');
            cloneWrapper.style.position = 'fixed';
            cloneWrapper.style.left = '-9999px';
            cloneWrapper.style.top = '0';
            cloneWrapper.style.width = TARGET_WIDTH + 'px';
            cloneWrapper.style.minWidth = TARGET_WIDTH + 'px';
            cloneWrapper.style.maxWidth = TARGET_WIDTH + 'px';
            cloneWrapper.style.zIndex = '-9999';
            cloneWrapper.style.backgroundColor = '#FFFFFF';
            cloneWrapper.style.transformOrigin = 'top left';

            // 2. Clone the original node and apply dedicated [EXPORT-FIX-04] .export-mode class
            const cloned = original.cloneNode(true);
            cloned.style.width = TARGET_WIDTH + 'px';
            cloned.style.minWidth = TARGET_WIDTH + 'px';
            cloned.style.maxWidth = TARGET_WIDTH + 'px';
            cloned.style.margin = '0';
            cloned.style.padding = '0';
            cloned.style.overflow = 'visible';
            cloned.classList.add('export-mode');

            // Remove all .no-print elements inside the clone
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

            // [EXPORT-FIX-01] Ensure all course card text expands dynamically without line-clamping or truncation
            const clampedEls = cloned.querySelectorAll('.line-clamp-1, .line-clamp-2, .truncate, .course-title-text, .faculty-name-text');
            clampedEls.forEach(function(el) {
                el.style.overflow = 'visible';
                el.style.textOverflow = 'clip';
                el.style.whiteSpace = 'normal';
                el.style.webkitLineClamp = 'unset';
                el.style.webkitBoxOrient = 'unset';
                el.style.display = 'block';
                el.style.maxHeight = 'none';
                el.style.lineHeight = '1.25';
            });

            // Ensure all day columns are fully visible with normal background in export clone
            const gridCols = cloned.querySelectorAll('.grid-day-col');
            gridCols.forEach(function(col) {
                col.style.opacity = '1';
                col.classList.remove('bg-[#EFF6FC]/60');
            });

            cloneWrapper.appendChild(cloned);
            document.body.appendChild(cloneWrapper);

            // 3. Render using html2canvas with scale 2 for crisp text
            if (typeof html2canvas === 'function') {
                html2canvas(cloned, {
                    scale: 2,
                    useCORS: true,
                    allowTaint: true,
                    backgroundColor: '#ffffff',
                    width: TARGET_WIDTH,
                    windowWidth: TARGET_WIDTH,
                    logging: false,
                    onclone: function(clonedDoc) {
                        const target = clonedDoc.querySelector('.export-mode');
                        if (target) {
                            target.style.webkitPrintColorAdjust = 'exact';
                            target.style.printColorAdjust = 'exact';
                        }
                    }
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

        // Notification Toast Helper (Microsoft Fluent Toast Style)
        function showToast(message, type) {
            type = type || 'info';
            let toast = document.getElementById('routineToast');
            if (!toast) {
                toast = document.createElement('div');
                toast.id = 'routineToast';
                document.body.appendChild(toast);
            }

            if (type === 'success') {
                toast.className = 'fixed bottom-5 right-5 z-50 px-4 py-2.5 rounded-[4px] shadow-[0_6.4px_14.4px_0_rgba(0,0,0,0.132)] text-xs sm:text-sm font-semibold flex items-center gap-2.5 bg-[#DFF6DD] text-[#107C41] border border-[#9FD89F] transition-all duration-300 transform translate-y-0 opacity-100';
                toast.innerHTML = '<svg class="w-4 h-4 text-[#107C41]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>' + message + '</span>';
            } else if (type === 'error') {
                toast.className = 'fixed bottom-5 right-5 z-50 px-4 py-2.5 rounded-[4px] shadow-[0_6.4px_14.4px_0_rgba(0,0,0,0.132)] text-xs sm:text-sm font-semibold flex items-center gap-2.5 bg-[#FDE7E9] text-[#A80000] border border-[#F4B2B6] transition-all duration-300 transform translate-y-0 opacity-100';
                toast.innerHTML = '<svg class="w-4 h-4 text-[#A80000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg><span>' + message + '</span>';
            } else {
                toast.className = 'fixed bottom-5 right-5 z-50 px-4 py-2.5 rounded-[4px] shadow-[0_6.4px_14.4px_0_rgba(0,0,0,0.132)] text-xs sm:text-sm font-semibold flex items-center gap-2.5 bg-[#EFF6FC] text-[#0078D4] border border-[#C7E0F4] transition-all duration-300 transform translate-y-0 opacity-100';
                toast.innerHTML = '<svg class="w-4 h-4 text-[#0078D4] animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg><span>' + message + '</span>';
            }

            setTimeout(function() {
                if (toast) {
                    toast.classList.add('translate-y-10', 'opacity-0');
                    toast.classList.remove('translate-y-0', 'opacity-100');
                }
            }, 3500);
        }

        // Interactive AJAX submission for Custom Routine toggle forms (+ Custom / ✓ Added)
        document.addEventListener('submit', function(e) {
            const form = e.target.closest('.custom-toggle-form');
            if (!form) return;

            e.preventDefault();
            const btn = form.querySelector('button');
            const originalContent = btn ? btn.innerHTML : '';
            if (btn) btn.disabled = true;

            fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (btn) btn.disabled = false;
                if (data.status === 'success') {
                    const isAdded = data.action === 'added';
                    const slotId = data.slot_id;

                    // Update all buttons referencing this slot across the page
                    const inputs = document.querySelectorAll('form.custom-toggle-form input[name="slot_id"][value="' + slotId + '"]');
                    inputs.forEach(input => {
                        const siblingBtn = input.closest('form').querySelector('button');
                        if (siblingBtn) {
                            if (isAdded) {
                                siblingBtn.className = 'text-[9px] font-semibold inline-flex items-center gap-1 transition text-[#A80000] hover:underline';
                                siblingBtn.innerHTML = '<span>✓ Added</span>';
                            } else {
                                siblingBtn.className = 'text-[9px] font-semibold inline-flex items-center gap-1 transition text-[#605E5C] hover:text-[#0078D4]';
                                siblingBtn.innerHTML = '<span>+ Custom</span>';
                            }
                        }
                    });

                    // Update sidebar custom routine badge
                    let badge = document.getElementById('sidebarCustomBadge');
                    if (data.total_selected > 0) {
                        if (badge) {
                            badge.textContent = data.total_selected;
                            badge.classList.remove('hidden');
                            badge.style.display = 'inline-block';
                        }
                    } else if (badge) {
                        badge.classList.add('hidden');
                        badge.style.display = 'none';
                    }

                    // Fluent Toast notification
                    if (isAdded) {
                        showToast('Course added to your Custom Routine! (' + data.total_selected + ' selected)', 'success');
                    } else {
                        showToast('Course removed from Custom Routine. (' + data.total_selected + ' selected)', 'info');
                    }
                }
            })
            .catch(err => {
                if (btn) {
                    btn.disabled = false;
                    btn.innerHTML = originalContent;
                }
                console.error('Failed to update custom routine:', err);
                showToast('Unable to connect to custom routine service.', 'error');
            });
        });

        // Fast Day Navigator Function for Phone & Windows Browsers
        function filterRoutineDay(selectedDay) {
            // 1. Update day pill active styles
            const pills = document.querySelectorAll('.day-nav-pill');
            pills.forEach(pill => {
                const day = pill.getAttribute('data-day');
                if (day === selectedDay) {
                    pill.className = 'day-nav-pill px-3 py-1.5 rounded-[4px] text-xs font-bold transition shrink-0 bg-[#0078D4] text-white shadow-xs cursor-pointer';
                } else {
                    pill.className = 'day-nav-pill px-2.5 sm:px-3 py-1.5 rounded-[4px] text-xs font-bold transition shrink-0 bg-white text-[#323130] hover:bg-[#EDEBE9] border border-[#E1DFDD] flex items-center gap-1.5 cursor-pointer';
                }
            });

            // 2. Day Cards View: Filter visible day sections instantly
            const cardSections = document.querySelectorAll('.routine-day-section');
            if (cardSections.length > 0) {
                cardSections.forEach(sec => {
                    const secDay = sec.getAttribute('data-day');
                    if (selectedDay === 'ALL' || secDay === selectedDay) {
                        sec.style.display = '';
                    } else {
                        sec.style.display = 'none';
                    }
                });
            }

            // 3. Grid Timetable View: Highlight/Dim and Auto-Scroll to Day Column
            const gridCols = document.querySelectorAll('.grid-day-col');
            if (gridCols.length > 0) {
                gridCols.forEach(col => {
                    const colDay = col.getAttribute('data-day');
                    if (selectedDay === 'ALL' || colDay === selectedDay) {
                        col.style.opacity = '1';
                        if (selectedDay !== 'ALL' && colDay === selectedDay) {
                            col.classList.add('bg-[#EFF6FC]/60');
                            // If this is a header cell, scroll into view smoothly inside overflow-x-auto container
                            if (col.tagName.toLowerCase() === 'th') {
                                col.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                            }
                        } else {
                            col.classList.remove('bg-[#EFF6FC]/60');
                        }
                    } else {
                        col.style.opacity = '0.3';
                        col.classList.remove('bg-[#EFF6FC]/60');
                    }
                });
            }
        }

        // Interactive About & Developer Modal Controls
        function openAboutModal() {
            const modal = document.getElementById('aboutModal');
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeAboutModal() {
            const modal = document.getElementById('aboutModal');
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }

        // Close on Escape or click on backdrop
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeAboutModal();
        });
        document.addEventListener('click', function(e) {
            const modal = document.getElementById('aboutModal');
            if (modal && e.target === modal) {
                closeAboutModal();
            }
        });
    </script>

    <!-- About & Developer Identity Modal (Microsoft Fluent Theme) -->
    <div id="aboutModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black/50 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="relative w-full max-w-lg bg-white rounded-[4px] shadow-[0_6.4px_14.4px_0_rgba(0,0,0,0.132),0_1.2px_3.6px_0_rgba(0,0,0,0.108)] border border-[#E1DFDD] p-6 space-y-4 animate-in fade-in zoom-in-95 duration-150">
            <!-- Modal Header -->
            <div class="flex items-start justify-between pb-3 border-b border-[#E1DFDD]">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/diu-swe-logo.svg') }}" alt="DIU Logo" class="h-8 w-auto max-w-[52px] object-contain shrink-0">
                    <div>
                        <h3 class="font-bold text-base text-[#323130]">DIU SWE Routine Organizer</h3>
                        <p class="text-xs text-[#605E5C]">Daffodil International University • Fall 2026</p>
                    </div>
                </div>
                <button type="button" onclick="closeAboutModal()" class="p-1 rounded text-[#605E5C] hover:text-[#323130] hover:bg-[#EDEBE9] transition cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Modal Content: Student Guide & Tips -->
            <div class="space-y-3.5 text-xs text-[#323130] leading-relaxed">
                <div>
                    <h4 class="font-bold text-[#0078D4] text-xs uppercase tracking-wider mb-1">Student Timetable Guide</h4>
                    <p class="text-[#605E5C]">
                        Welcome to the <strong>DIU SWE Routine Organizer</strong>. Designed to help Software Engineering students at Daffodil International University (DIU), Ashulia Smart City navigate weekly class routines, locate open study spaces, and organize courses.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-[11px]">
                    <div class="p-3 rounded-[4px] bg-[#EFF6FC] border border-[#C7E0F4]">
                        <div class="font-bold text-[#0078D4] flex items-center gap-1.5">
                            <span>📅 Instant Batch Routines</span>
                        </div>
                        <div class="text-[#605E5C] mt-1">Select your batch (40–49) and click section pills (A, B, C, ...) to immediately load your weekly class schedule.</div>
                    </div>
                    <div class="p-3 rounded-[4px] bg-[#DFF6DD] border border-[#9FD89F]">
                        <div class="font-bold text-[#107C41] flex items-center gap-1.5">
                            <span>🚪 Empty Room Locator</span>
                        </div>
                        <div class="text-[#605E5C] mt-1">Check dedicated SWE rooms and computer labs during free periods for quiet study or project work.</div>
                    </div>
                    <div class="p-3 rounded-[4px] bg-[#FFF4CE] border border-[#FED9CC]">
                        <div class="font-bold text-[#8A3707] flex items-center gap-1.5">
                            <span>👨‍🏫 Teacher Schedule Lookup</span>
                        </div>
                        <div class="text-[#605E5C] mt-1">Search any teacher by initials or name to see their full teaching schedule and office counseling hours.</div>
                    </div>
                    <div class="p-3 rounded-[4px] bg-[#F3F2F1] border border-[#E1DFDD]">
                        <div class="font-bold text-[#323130] flex items-center gap-1.5">
                            <span>📥 Image &amp; Calendar Export</span>
                        </div>
                        <div class="text-[#605E5C] mt-1">Download clean A4 Landscape images for your phone wallpaper or sync directly with Outlook &amp; Google Calendar.</div>
                    </div>
                </div>

                <!-- Academic Routine Note -->
                <div class="p-3 rounded-[4px] bg-[#FAF9F8] border border-[#E1DFDD] space-y-1.5 text-[11px]">
                    <div class="font-bold text-[#323130] flex items-center justify-between">
                        <span>Academic Session Information</span>
                        <span class="text-[9.5px] px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 font-semibold border border-emerald-200">Fall 2026 Live</span>
                    </div>
                    <div class="text-[#605E5C] leading-snug">
                        Class timings and room assignments follow official Department of Software Engineering scheduling. For any section clash or course retake inquiries, please consult the SWE Routine Committee.
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="pt-3 border-t border-[#E1DFDD] flex items-center justify-between text-[11px] text-[#605E5C]">
                <span>Dept of Software Engineering • Daffodil International University</span>
                <button type="button" onclick="closeAboutModal()" class="px-3.5 py-1.5 rounded-[4px] bg-[#0078D4] text-white hover:bg-[#106EBE] font-semibold text-xs transition cursor-pointer">
                    Got it
                </button>
            </div>
        </div>
    </div>
</body>
</html>
