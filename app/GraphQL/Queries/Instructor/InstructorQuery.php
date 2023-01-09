<?php

namespace App\GraphQL\Queries\Instructor;

use App\Models\Instructor;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class InstructorQuery extends Query
{
    protected $attributes = [
        'name' => 'Instructor',
    ];

    public function type(): Type
    {
        return GraphQL::type('Instructor');
    }
}