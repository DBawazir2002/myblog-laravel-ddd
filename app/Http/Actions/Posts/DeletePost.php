<?php

namespace App\Http\Actions\Posts;

use Repository\PostRepository;

class DeletePost
{
    public function __construct(
        private PostRepository $repository
    ) {}

    public function handle(string $id): void
    {
        $this->repository->destroy($id);
    }
}
