<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\InstructorCourse;
use App\Models\Instructor;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InstructorCourse>
 */
class InstructorCourseFactory extends Factory
{
    protected $model = InstructorCourse::class;

    public function definition(): array
    {
        return [
        ];
    }
}
