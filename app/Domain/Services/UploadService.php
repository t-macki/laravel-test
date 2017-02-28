<?php
namespace App\Domain\Services;

use App\Domain\Repositories\UploadRepositoryInterface;

class UploadService
{
    /** @var UploadRepositoryInterface */
    protected $repository;

    public function __construct(UploadRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function save($inputs)
    {
        return $this->repository->save($inputs);
    }
}