<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository extends BaseRepository
{
    protected $entity;

    public function __construct(Employee $employee)
    {
        $this->entity = $employee;
    }
}
