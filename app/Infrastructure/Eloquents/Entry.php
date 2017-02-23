<?php

namespace App\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    /** @var string */
    protected $table = 'entries';

    /** @var array */
    protected $fillable = ['title', 'body', 'user_id'];
}
