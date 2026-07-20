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
        'image',
        'file'
    ];

    public function courses()
    {
    return $this->belongsToMany(Course::class);
   }
}