<?php

namespace App\Http\Actions\Posts;

use Illuminate\Database\Eloquent\Model;
use Repository\PostRepository;
use Spatie\LaravelData\Data;

class CreatePost
{
    public function __construct(
        private PostRepository $repository
    ) {}

    public function handle(Data $data): Model
    {
        $post = $this->repository->store($data);
        $this->repository->addMedia($post, 'image', 'image');

        return $post;
    }
}
