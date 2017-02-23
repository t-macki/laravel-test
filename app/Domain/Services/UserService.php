<?php
namespace App\Domain\Services;

use App\Domain\Repositories\UserRepositoryInterface;

class UserService
{
    /** @var UserRepositoryInterface */
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function find($query)
    {
        return $this->userRepository->find($query);
    }

    public function findId($query){
        return $this->userRepository->findId($query);
    }
}