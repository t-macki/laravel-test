<?php
namespace App\Infrastructure\Repositories;

use App\Infrastructure\Eloquents\Entry;
use App\Domain\Repositories\EntryRepositoryInterface;

/**
 * Class EntryRepository
 */
class EntryRepository implements EntryRepositoryInterface
{
    /** @var \App\Infrastructure\Eloquents\Entry */
    protected $eloquent;

    /**
     * @param Entry     $eloquent
     */
    public function __construct(Entry $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @param array $params
     *
     * @return mixed
     */
    public function save(array $params)
    {
        $attributes = [];
        $attributes['id'] = (isset($params['id'])) ? $params['id'] : null;
        $result = $this->eloquent->updateOrCreate($attributes, $params);
        return $result;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->eloquent->find($id);
        return $result;
    }

    /**
     * @return int
     */
    public function count()
    {
        $result = $this->eloquent->count();
        return $result;
    }
}
