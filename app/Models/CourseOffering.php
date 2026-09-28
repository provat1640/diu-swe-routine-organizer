<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseOffering extends Model
{
    protected $table = 'course_offerings';

    protected $fillable = ['course_id', 'batch', 'section', 'major_track', 'semester', 'year', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];
}
