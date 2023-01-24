<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'description',
        'image',
    ];

    public function instructors(): Relation
    {
        return $this->belongsToMany(Instructor::class, 'instructor_courses');
    }
}
