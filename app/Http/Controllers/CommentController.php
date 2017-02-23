<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;

/**
 * コメント投稿を扱うコントローラクラスです
 *
 * Class CommentController
 */
class CommentController extends Controller
{
    /**
     * @param Request $request
     * @param CommentService $comment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, CommentService $comment)
    {
        $params = $request->only(['name', 'comment', 'entry_id']);
        $comment->addComment($params);
        return redirect()->route('entry.show', [$params['entry_id']]);
    }
}
