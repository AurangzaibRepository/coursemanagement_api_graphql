<?php

namespace App\GraphQL\Types;

use App\Models\Instructor;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class InstructorType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Instructor',
        'description' => 'Collection of instructor',
        'model' => Instructor::class,
    ];
}