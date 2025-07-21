<?php

namespace App\Http\Actions\Categories;

use Illuminate\Database\Eloquent\Model;
use Repository\CategoryRepository;
use Spatie\LaravelData\Data;

class CreateCategory
{
    public function __construct(
        private CategoryRepository $repository
    ) {}

    public function handle(Data $data): Model
    {
        $category = $this->repository->store($data);
        $this->repository->addMedia($category, 'image', 'image');

        return $category;
    }
}
