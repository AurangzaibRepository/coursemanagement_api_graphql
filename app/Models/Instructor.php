<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    public $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'courses_count',
    ];

    public function courses(): Relation
    {
        return $this->belongsToMany(Course::class, 'instructor_courses');
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => "{$attributes['first_name']} {$attributes['last_name']}",
        );
    }
}
