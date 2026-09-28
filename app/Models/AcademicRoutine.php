<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcademicRoutine extends Model
{
    use HasFactory;

    protected $table = 'academic_routines';

    protected $fillable = [
        'semester',
        'year',
        'batch',
        'section',
        'major_track',
        'course_id',
        'teacher_initials',
        'classroom_no',
        'building',
        'day_of_week',
        'start_time',
        'end_time',
    ];

    /**
     * Dedicated Software Engineering Department physical spaces.
     */
    public const SWE_DEDICATED_ROOMS = [
        'Annex-106',
        'Annex-107',
        'Annex-108',
        'Annex-308',
        'Annex-309',
        '610',
        '611',
        '612',
        '616',
        '710',
        '711A',
        '711B',
        '814A',
        '814B',
        '903',
        'AB3-104',
        'AB3-106',
        'AB3-107',
    ];

    /**
     * Standard DIU Academic Days in chronological order.
     */
    public const DAY_ORDER = [
        'Saturday' => 1,
        'Sunday' => 2,
        'Monday' => 3,
        'Tuesday' => 4,
        'Wednesday' => 5,
        'Thursday' => 6,
        'Friday' => 7,
    ];

    /**
     * Standard Time Slot Intervals.
     */
    public const TIME_SLOTS = [
        ['start' => '08:30:00', 'end' => '10:00:00', 'label' => '08:30 AM - 10:00 AM', 'short' => '8:30-10:00'],
        ['start' => '10:00:00', 'end' => '11:30:00', 'label' => '10:00 AM - 11:30 AM', 'short' => '10:00-11:30'],
        ['start' => '11:30:00', 'end' => '13:00:00', 'label' => '11:30 AM - 01:00 PM', 'short' => '11:30-1:00'],
        ['start' => '13:00:00', 'end' => '14:30:00', 'label' => '01:00 PM - 02:30 PM', 'short' => '1:00-2:30'],
        ['start' => '14:30:00', 'end' => '16:00:00', 'label' => '02:30 PM - 04:00 PM', 'short' => '2:30-4:00'],
        ['start' => '16:00:00', 'end' => '17:30:00', 'label' => '04:00 PM - 05:30 PM', 'short' => '4:00-5:30'],
    ];

    public static function weekdays(): array
    {
        return ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    }

    /**
     * Building resolver helper.
     */
    public static function resolveBuilding(string $room): string
    {
        $r = strtoupper(trim($room));
        if (str_contains($r, 'ONLINE')) {
            return 'ONLINE';
        }
        if (str_contains($r, 'ANNEX')) {
            return 'Annex';
        }
        if (str_starts_with($r, 'AB3') || $r === '101A') {
            return 'AB3';
        }
        if (str_starts_with($r, '14') || str_starts_with($r, '15')) {
            return 'Main';
        }
        if (str_starts_with($r, '8') || str_starts_with($r, '9')) {
            return 'AB4';
        }
        if (str_starts_with($r, '6') || str_starts_with($r, '7')) {
            return 'AB3';
        }

        return 'AB3';
    }

    /**
     * Scope query for faculty initials.
     */
    public function scopeForTeacher(Builder $query, string $teacher): Builder
    {
        return $query->where('teacher_initials', strtoupper(trim($teacher)));
    }

    /**
     * Scope query for specific course code.
     */
    public function scopeForCourse(Builder $query, string $courseCode): Builder
    {
        $code = strtoupper(trim(str_replace(' ', '', $courseCode)));

        return $query->where(function ($q) use ($code) {
            $q->where('course_id', $code)
                ->orWhere('course_id', 'LIKE', "%{$code}%");
        });
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('start_time')->orderBy('end_time')->orderBy('id');
    }

    /**
     * Relation to CourseOffering if matched.
     */
    public function courseOffering(): BelongsTo
    {
        return $this->belongsTo(CourseOffering::class, 'course_id', 'course_code');
    }
}
