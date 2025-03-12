<?php
namespace App\Repositories;

use App\Models\Company;

class CompanyRepository extends BaseRepository
{
    protected $entity;

    public function __construct(Company $company)
    {
        $this->entity = $company;
    }
}
