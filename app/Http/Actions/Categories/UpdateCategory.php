<?php

namespace App\Http\Actions\Categories;

use Illuminate\Database\Eloquent\Model;
use Repository\CategoryRepository;
use Spatie\LaravelData\Data;

class UpdateCategory
{
    public function __construct(
        private CategoryRepository $repository
    ) {}

    public function handle(string $id, Data $data): Model
    {
        $category = $this->repository->update($data, $id);
        $this->repository->addMedia($category, 'image', 'image');

        return $category;
    }
}
