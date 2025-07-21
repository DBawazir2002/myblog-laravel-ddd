<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Actions\Posts\CreatePost;
use App\Http\Actions\Posts\DeletePost;
use App\Http\Actions\Posts\UpdatePost;
use App\Http\Controllers\Controller;
use Domain\Dashboard\DataTransferToObject\Posts\StorePostData;
use Domain\Dashboard\DataTransferToObject\Posts\UpdatePostData;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Repository\CategoryRepository;
use Repository\PostRepository;

class PostController extends Controller
{
    public function __construct(
        private PostRepository $repository,
        private CategoryRepository $categoryRepository
    ) {}

    public function index(): View
    {
        $posts = $this->repository->index();

        return view('dashboard.posts.index', compact('posts'));
    }

    public function create(): View|RedirectResponse
    {
        $categories = $this->categoryRepository->list();

        return count($categories) > 0 ? view('dashboard.posts.create', ['categories' => $categories]) : redirect()->intended(route('dashboard.categories.index', absolute: false))->with(['error' => __('messages.empty_categories')]);
    }

    public function show(string $id): View
    {
        $post = $this->repository->find($id);

        return view('dashboard.posts.show', compact('post'));
    }

    public function store(StorePostData $data, CreatePost $action): RedirectResponse
    {
        $post = $action->handle($data);

        return to_route('dashboard.posts.show', $post)->with(['status' => __('messages.success_stored')]);
    }

    public function edit(string $id): View
    {
        $post = $this->repository->find($id);
        $categories = $this->categoryRepository->list();

        return view('dashboard.posts.edit', compact(['post', 'categories']));
    }

    public function update(UpdatePostData $data, string $id, UpdatePost $action): RedirectResponse
    {
        $post = $action->handle($id, $data);

        $this->repository->addMedia($post, 'image', 'image');

        return to_route('dashboard.posts.show', $post)->with(['status' => __('messages.success_updated')]);
    }

    public function destroy(string $id, DeletePost $action): RedirectResponse
    {
        $action->handle($id);

        return to_route('dashboard.posts.index')->with(['status' => __('messages.success_deleted')]);
    }
}
