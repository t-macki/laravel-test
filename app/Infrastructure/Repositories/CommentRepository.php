<?php
namespace App\Infrastructure\Repositories;

use App\Infrastructure\Eloquents\Comment;
use App\Domain\Repositories\CommentRepositoryInterface;

/**
 * Class CommentRepository
 */
class CommentRepository implements CommentRepositoryInterface
{
    /** @var Comment */
    protected $eloquent;

    /**
     * @param Comment   $eloquent
     */
    public function __construct(Comment $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function allByEntry($id)
    {
        return $this->eloquent->getAllByEntryId($id);
    }

    /**
     * @param array $params
     *
     * @return mixed
     */
    public function save(array $params)
    {
        return $this->eloquent->fill($params)->save();
    }
}
