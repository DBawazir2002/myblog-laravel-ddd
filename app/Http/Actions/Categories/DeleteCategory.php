<?php

namespace App\Http\Actions\Categories;

use Repository\CategoryRepository;

class DeleteCategory
{
    public function __construct(
        private CategoryRepository $repository
    ) {}

    public function handle(string $id): void
    {
        $this->repository->destroy($id);
    }
}
