<?php
namespace App\Domain\Repositories;

interface UserRepositoryInterface
{
    public function findId($query);

    public function find($query);

}