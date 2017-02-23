<?php
namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\UserRepositoryInterface;
use App\Infrastructure\Eloquents\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    protected $eloquent;

    public function __construct(User $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function findId($query)
    {
        return $this->eloquent->query()->find($query['id']);
    }

    public function find($query)
    {
        \Log::debug(print_r($query, true));
        $users = $this->eloquent->query()->where('name', 'LIKE', '%' . $query['name'] . '%')->get();
        \Log::debug($users);
        return $users;
    }
}