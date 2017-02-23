<?php

namespace App\Services;

use App\Domain\Repositories\EntryRepositoryInterface;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class EntryService
 */
class EntryService
{
    /** @var \App\Domain\Repositories\EntryRepositoryInterface */
    protected $entry;

    /**
     * @param EntryRepositoryInterface $entry
     * @param Gate                     $gate
     */
    public function __construct(EntryRepositoryInterface $entry)
    {
        $this->entry = $entry;
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function addEntry(array $attributes)
    {
        return $this->entry->save($attributes);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getEntry($id)
    {
        return $this->entry->find($id);
    }

}
