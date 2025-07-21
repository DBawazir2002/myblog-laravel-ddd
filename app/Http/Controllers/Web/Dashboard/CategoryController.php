<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Actions\Categories\CreateCategory;
use App\Http\Actions\Categories\DeleteCategory;
use App\Http\Actions\Categories\UpdateCategory;
use App\Http\Controllers\Controller;
use Domain\Dashboard\DataTransferToObject\Categories\StoreCategoryData;
use Domain\Dashboard\DataTransferToObject\Categories\UpdateCategoryData;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Repository\CategoryRepository;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryRepository $repository
    ) {}

    public function index(): View
    {
        $categories = $this->repository->index();

        return view('dashboard.categories.index', compact('categories'));
    }

    public function show(string $id): View
    {
        $category = $this->repository->find($id);

        return view('dashboard.categories.show', compact('category'));
    }

    public function create(): View
    {
        return view('dashboard.categories.create');
    }

    public function store(StoreCategoryData $data, CreateCategory $action): RedirectResponse
    {
        $category = $action->handle($data);

        return to_route('dashboard.categories.show', $category)->with(['status' => __('messages.success_stored')]);
    }

    public function edit(string $id): View
    {
        $category = $this->repository->find($id);

        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryData $data, string $id, UpdateCategory $action): RedirectResponse
    {
        $category = $action->handle($id, $data);

        return to_route('dashboard.categories.show', $category)->with(['status' => __('messages.success_updated')]);
    }

    public function destroy(string $id, DeleteCategory $action): RedirectResponse
    {
        $action->handle($id);

        return to_route('dashboard.categories.index')->with(['status' => __('messages.success_deleted')]);
    }
}
