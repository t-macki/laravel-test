<?php

namespace App\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @var string */
    protected $table = 'comments';

    /** @var array */
    protected $fillable = ['comment', 'name', 'entry_id'];

    public function getAllByEntryId($id)
    {
        return $this->query()
            ->where('entry_id', $id)
            ->orderBy($this->primaryKey, 'ASC')->get();
    }
}
