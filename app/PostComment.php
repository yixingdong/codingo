<?php

namespace App;

use App\Traits\CommentTrait;
use Illuminate\Database\Eloquent\Model;
use App\Comment;

class PostComment extends Comment
{
    use CommentTrait; // 这部分放在Comment中死活不起作用，不得已采用这样方式

    protected $target_name = 'post';
}
