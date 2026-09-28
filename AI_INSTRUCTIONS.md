# AI Instructions & System Blueprint: DIU SWE Routine Organizer

This file serves as a system context ledger and structural prompt blueprint to instruct any AI developer agent (GitHub Copilot Agent Mode, Cursor, or Claude Code) on the exact technical layout, constraints, database schemas, and architectural expectations of this project.

---

## 💻 1. Core Technical Stack & Architectural Rules
The AI agent must strictly write code that adheres to the following system constraints. Do not deviate under any circumstances.
- **Backend Architecture:** PHP 8.4+ running inside the **Laravel 13 Framework**. Enforce standard Eloquent ORMs, Blade templates, and clean controller separations.
- **Frontend Layer:** Standard HTML5, **Tailwind CSS**, and vanilla JavaScript embedded natively within Blade layout structures. *Do not introduce Node.js frontend servers, React, Vue, or modern compilation bundles outside Laravel's default asset wrapper pipeline.*
- **Database Architecture:** **MySQL / MariaDB** hosted locally via **XAMPP Localhost Engine**. All connection variables must target port `3306` with credentials configured inside the root `.env` configuration matrix.
- **Integration Target:** Clean, decoupled **RESTful API endpoints** serving lightweight JSON payloads to connect seamlessly with a future Android Mobile Application.

---

## 📊 2. Department Cohort Matrix & Capacity Allocation Ledger
The routine matrix maps out the entire Daffodil International University (DIU) Software Engineering department syllabus load. The AI must enforce these exact batch configurations and section boundaries within validation routines and controllers:

| Cohort / Target Batch | Section Character Range Boundary | Major Engineering Branch Tracks (Tracks Flag) |
| :--- | :--- | :--- |
| **Batches 49, 48, 47, 46, 42** | 13 Sections (`A` through `M` alphabetically) | Core Requirements Matrix (No specialization track split) |
| **Batches 45, 44, 43** | 14 Sections (`A` through `N` alphabetically) | Core Requirements Matrix (No specialization track split) |
| **Batch 41 (Specialized Majors)**| 12 Sections (`A` through `L` alphabetically) | **SE** (Software Engineering)<br>**DS** (Data Science)<br>**RE** (Robotics & Embedded Systems)<br>**ST** (Software Testing)<br>**CS** (Cyber Security) |
| **Batch 40 (Graduating Seniors)**| 6 Sections (`A` through `F` alphabetically) | Senior Project Modules (Mapped as `SE` track entries) |

---

## 🗄️ 3. Root Database Schema Blueprint (`database_schema.sql`)
This is the verified physical layout of the MySQL database tables inside XAMPP. Use this structural design to build Eloquent relations and compile data queries:

```sql
CREATE DATABASE IF NOT EXISTS diu_swe_routine_organizer_db;
USE diu_swe_routine_organizer_db;

-- Dynamic Syllabi Rules Engine Matrix
CREATE TABLE course_offerings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    semester VARCHAR(20) NOT NULL DEFAULT 'Fall',
    year VARCHAR(4) NOT NULL DEFAULT '2026',
    batch INT NOT NULL,
    major_track VARCHAR(10) NULL, -- 'SE', 'DS', 'RE', 'ST', 'CS' or NULL
    course_code VARCHAR(20) NOT NULL,
    course_name VARCHAR(150) NOT NULL,
    credits INT NOT NULL DEFAULT 3,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY idx_offering_unique (semester, year, batch, major_track, course_code)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Core Scheduling Ledger Tracker
CREATE TABLE academic_routines (
    id INT AUTO_INCREMENT PRIMARY KEY,
    semester VARCHAR(20) NOT NULL DEFAULT 'Fall',
    year VARCHAR(4) NOT NULL DEFAULT '2026',
    batch INT NOT NULL,
    section VARCHAR(5) NOT NULL,
    major_track VARCHAR(10) NULL,
    course_id VARCHAR(20) NOT NULL,
    teacher_initials VARCHAR(10) NOT NULL,
    classroom_no VARCHAR(20) NOT NULL,
    building VARCHAR(20) NOT NULL, -- 'Annex', 'AB3', 'AB4', 'Main', 'ONLINE'
    day_of_week ENUM('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday') NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

---

## 🧠 4. Crucial Business Logic & Algorithmic Guardrails
When expanding or processing operations inside `RoutineController.php`, the AI agent must enforce these three distinct features and safety systems:

### 🧩 A. Database-Agnostic Day Sorting (Failsafe Redundancy)
- **Problem:** Using raw SQL sorting expressions like MySQL's `FIELD()` statement will immediately trigger a fatal `QueryException` crash if the developer runs test migrations locally on SQLite configurations.
- **Required Solution:** Fetch records sorted chronologically by `start_time` first. Then, use Laravel's standard PHP Collection sorting methods to organize rows by academic days using a rigid associative array mapping key dictionary:
  ```php
  $dayOrder = ['Saturday' => 1, 'Sunday' => 2, 'Monday' => 3, 'Tuesday' => 4, 'Wednesday' => 5, 'Thursday' => 6, 'Friday' => 7];
  $routines = $rawCollection->sortBy(function ($item) use ($dayOrder) {
      return $dayOrder[$item->day_of_week] ?? 99;
  })->groupBy('day_of_week');
  ```

### 🔍 B. Faculty Schedules Search by Initial
- Implement an index-scanning search string field within the web toolbar and mobile API controller layers.
- Allow users to query by specific teacher initials (e.g., `MRA`, `MZH`, `DSM`). The engine must return a chronological tracking matrix listing every routine slot assigned to that specific initial across all days, building blocks, and batches.

### 🔀 C. Customizable Routine Engine (Irregular / Cross-Batch Sorting)
- Build support for non-traditional, irregular students retaking courses across different semesters.
- Allow students to lookup specific `course_code` variables across the system matrix. The controller must scan the ledger database, display all active section options, and permit the user to checkbox-select their preferred slot combination. Save these choices inside a session-backed array token structure to compile a "Custom Calendar Grid View" on demand.

### 🚪 D. Dedicated SWE Empty Room Tracker
- Maintain a static array ledger of dedicated Software Engineering department physical spaces: `Annex-106`, `Annex-107`, `Annex-108`, `Annex-308`, `Annex-309`, `610`, `611`, `612`, `616`, `710`, `711A`, `711B`, `814A`, `814B`, `903`, `AB3-104`, `AB3-106`, `AB3-107`.
- Build an algorithm that takes a selected day and time slot block, filters out rooms marked as occupied inside the `academic_routines` ledger table, and dynamically outputs an automated checklist of completely empty rooms for student study groups.

---

## 📡 5. Mobile Synchronization Unified JSON Interface (REST APIs)
All features implemented inside `routes/web.php` must be cleanly exposed as mobile network interface endpoints under `routes/api.php` targeting the route path `/api/v1/android-sync`. 

The response must return a lightweight, structured JSON string payload formatting signature that matches this structural output definition:
```json
{
  "status": "success",
  "client": "Android Integration Layer",
  "feature": "empty_rooms",
  "meta": {
    "day_of_week": "Sunday",
    "timestamp": "10:00:00"
  },
  "payload": [
    {
      "room_no": "Annex-108",
      "building": "Annex",
      "status": "Available / Empty"
    }
  ]
}
```

---

## 🚀 6. Instructions for AI Code Injection Actions
When processing tasks for this project:
1. Scan the root path variables inside `.env` to verify the active database handshake connection rules.
2. Inject queries directly into `RoutineController.php`, routing them via absolute path strings to avoid directory mismatch blocks.
3. Keep frontend views beautifully styled under dark mode rules using **Tailwind CSS classes** (`bg-slate-900`, `text-indigo-400`, `border-slate-700`).
4. Always clear framework configurations via terminal artisan tools (`php artisan config:clear`) before reporting operational task completion.