<?php

namespace Repository;

use App\Models\Post;

class PostRepository extends BaseRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = Post::class;
    }
}
