<?php

namespace App\GraphQL\Enums;

use Rebing\GraphQL\Support\EnumType;

class StatusEnum extends EnumType
{
    protected $attributes = [
        'name' => 'Status',
        'description' => 'List of status',
        'values' => [
            'Active' => 'Active',
            'Inactive' => 'Inactive',
        ],
    ];
}