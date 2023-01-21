<?php

namespace App\GraphQL\Queries\Instructor;

use App\Models\Instructor;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class InstructorsQuery extends Query
{
    protected $attributes = [
        'name' => 'Instructors list',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Instructor'));
    }
}