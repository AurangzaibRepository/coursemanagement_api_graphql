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

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => 'required|exists:instructors',
            ],
        ];
    }

    public function resolve($root, $args): Collection
    {
        return Instructor::find($args['id']);
    }

    public function validationErrorMessages(array $args=[]): array
    {
        return [
            'id.required' => 'Id is required',
            'id.exists' => 'Instructor not found',
        ];
    }
}