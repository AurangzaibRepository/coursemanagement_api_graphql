<?php

namespace App\GraphQL\Queries\Instructor;

use App\Models\Instructor;
use App\Enums\Status;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Arr;

class InstructorsQuery extends Query
{
    protected $attributes = [
        'name' => 'Instructors list',
    ];

    public function type(): Type
    {
        return GraphQL::paginate('Instructor');
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
            ],
            'status' => [
                'name' => 'status',
                'type' => Type::string(),
                'rules' => [new Enum(Status::class)],
            ],
            'page_no' => [
                'name' => 'page_no',
                'type' => Type::int(),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $query = $this->applyFilters($args);
        $pageSize = config('app.page_size');
        $pageNo = (Arr::exists($args, 'page_no') ? $args['page_no'] : 1);
        $offset = ($pageNo * $pageSize) - $pageSize;

        return $query->paginate($pageSize, ['*'], 'page', $pageNo);
    }

    private function applyFilters(array $filters): Builder
    {
        $query = Instructor::orderBy('id');

        if (Arr::exists($filters, 'email')) {
            $query = $query->where('email', 'like', "%{$filters['email']}%");
        }

        if (Arr::exists($filters, 'status')) {
            $query = $query->where('status', $filters['status']);
        }

        if (Arr::exists($filters, 'name')) {
            $query = $query->whereRaw("(first_name like '%{$filters['name']}%' or last_name like '%{$filters['name']}%')");
        }

        return $query;
    }

    public function validationErrorMessages(array $args=[]): array
    {
        return [
            'status.Illuminate\Validation\Rules\Enum' => 'Invalid status',
        ];
    }
}