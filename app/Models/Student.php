<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'department',
        'semester',
        'course_id',
        'image'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}