<?php
namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends BaseService
{
    protected $repo;

    public function __construct(UserRepository $userRepository)
    {
        $this->repo = $userRepository;
    }
}
