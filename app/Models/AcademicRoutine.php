<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class AcademicRoutine extends Model
{
    protected $table = 'academic_routines';

    protected $fillable = [
        'semester', 'year', 'batch', 'section', 'major_track', 'course_id',
        'teacher_initials', 'classroom_no', 'building', 'day_of_week',
        'start_time', 'end_time',
    ];

    protected static function booted(): void
    {
        static::saving(function (self $routine): void {
            $routine->teacher_initials = strtoupper(trim((string) $routine->teacher_initials));
            $routine->section = strtoupper(trim((string) $routine->section));
            $routine->day_of_week = trim((string) $routine->day_of_week);

            if (! in_array($routine->day_of_week, self::weekdays(), true)) {
                throw ValidationException::withMessages(['day_of_week' => 'Select a valid weekday.']);
            }

            if ((string) $routine->start_time >= (string) $routine->end_time) {
                throw ValidationException::withMessages(['end_time' => 'The end time must be after the start time.']);
            }

            $overlap = static::query()
                ->whereKeyNot($routine->getKey())
                ->where('day_of_week', $routine->day_of_week)
                ->where(function (Builder $query) use ($routine): void {
                    $query->where(function (Builder $query) use ($routine): void {
                        $query->where('classroom_no', $routine->classroom_no)
                            ->where('building', $routine->building);
                    })->orWhere('teacher_initials', $routine->teacher_initials)
                      ->orWhere(function (Builder $query) use ($routine): void {
                          $query->where('batch', $routine->batch)
                              ->where('section', $routine->section)
                              ->when($routine->major_track, fn (Builder $q) => $q->where('major_track', $routine->major_track));
                      });
                })
                ->where('start_time', '<', $routine->end_time)
                ->where('end_time', '>', $routine->start_time)
                ->exists();

            if ($overlap) {
                throw ValidationException::withMessages([
                    'routine' => 'This slot overlaps an existing room, faculty, or section allocation.',
                ]);
            }
        });
    }

    public static function weekdays(): array
    {
        return ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('start_time')->orderBy('end_time')->orderBy('id');
    }

    private function getKeyName(): string
    {
        return parent::getKeyName();
    }

    private function whereKeyNot(Builder $query, mixed $key): Builder
    {
        return $key ? $query->whereKeyNot($key) : $query;
    }
}
