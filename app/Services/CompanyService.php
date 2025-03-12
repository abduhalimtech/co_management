<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService extends BaseService
{
    protected $repo;
    protected $filter_fields = [
        'name' => ['type' => 'string'],
        'email' => ['type' => 'string']
    ];

    public function __construct(CompanyRepository $repo)
    {
        $this->repo = $repo;
    }
}
