<?php

namespace App\Http\Actions\Posts;

use Illuminate\Database\Eloquent\Model;
use Repository\PostRepository;
use Spatie\LaravelData\Data;

class UpdatePost
{
    public function __construct(
        private PostRepository $repository
    ) {}

    public function handle(string $id, Data $data): Model
    {
        $post = $this->repository->update($data, $id);
        $this->repository->addMedia($post, 'image', 'image');

        return $post;
    }
}
