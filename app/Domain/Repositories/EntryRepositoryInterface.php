<?php
namespace App\Domain\Repositories;

/**
 * Interface EntryRepositoryInterface
 */
interface EntryRepositoryInterface
{
    /**
     * @param array $params
     *
     * @return mixed
     */
    public function save(array $params);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id);

    /**
     * @return mixed
     */
    public function count();
}
