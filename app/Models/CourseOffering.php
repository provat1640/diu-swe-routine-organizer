<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseOffering extends Model
{
    use HasFactory;

    protected $table = 'course_offerings';

    protected $fillable = [
        'semester',
        'year',
        'batch',
        'major_track',
        'course_code',
        'course_name',
        'credits',
    ];

    /**
     * Scope query for batch and optional major track.
     */
    public function scopeForBatch(Builder $query, int $batch, ?string $track = null): Builder
    {
        $query->where('batch', $batch);

        if (! empty($track)) {
            $query->where(function ($q) use ($track) {
                $q->where('major_track', $track)
                    ->orWhereNull('major_track');
            });
        }

        return $query;
    }

    /**
     * Routines associated with this course offering.
     */
    public function routines(): HasMany
    {
        return $this->hasMany(AcademicRoutine::class, 'course_id', 'course_code');
    }
}
