<?php
/**
 * Created by PhpStorm.
 * User: makino
 * Date: 2017/02/27
 * Time: 14:16
 */

namespace App\Infrastructure\Repositories;


abstract class BaseRepository
{
    protected $eloquent;

    public function delete($id)
    {
        $this->eloquent->where('id', '=', $id)->delete();
    }

    public function clear()
    {
        $this->eloquent->query()->delete();
    }

    public function create(array $data)
    {
        return $this->eloquent->create($data);
    }

    public function update(array $data, $id, $attribute = "id")
    {
        return $this->eloquent->where($attribute, '=', $id)->update($data);
    }

    public function find($id, $columns = array('*'))
    {
        return $this->eloquent->find($id, $columns);
    }

    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->eloquent->where($attribute, '=', $value)->first($columns);
    }

    public function findAllBy($attribute, $value, $columns = array('*'))
    {
        return $this->eloquent->where($attribute, '=', $value)->get($columns);
    }

}