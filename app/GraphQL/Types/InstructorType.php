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

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Instructor Id',
            ],
            'first_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Instructor first name',
            ],
            'last_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Instructor last name',
            ],
            'phone_number' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Instructor phone number',
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Instructor email',
            ],
            'image' => [
                'type' => Type::string(),
                'description' => 'Instructor image',
            ],
            'status' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Instructor status',
            ],
            'courses_count' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Number of courses taught by instructor',
            ],
        ];
    }

    protected function resolveImageField($root, array $args): string
    {
        return url("/images/instructors/{$args['image']}");
    }
}