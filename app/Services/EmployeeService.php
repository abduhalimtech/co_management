<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;

class EmployeeService extends BaseService
{
    protected $repo;
    protected $filter_fields = [
        'last_name' => ['type' => 'string'],
        'position' => ['type' => 'string']
    ];

    public function __construct(EmployeeRepository $repo)
    {
        $this->repo = $repo;
    }
}
