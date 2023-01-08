<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Instructor;

class InstructorSeeder extends Seeder
{
    public function run(): void
    {
        Instructor::factory()
            ->count(10) 
            ->create();
    }
}
