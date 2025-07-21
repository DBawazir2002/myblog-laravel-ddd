<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Repository\CategoryRepository;
use Repository\PostRepository;

class DashboardController extends Controller
{
    public function __construct(
        private CategoryRepository $categoryRepository,
        private PostRepository $postRepository
    ) {}

    public function __invoke(): View
    {
        $categoriesCount = $this->categoryRepository->count();
        $postsCount = $this->postRepository->count();

        return view('dashboard.index', compact(['categoriesCount', 'postsCount']));
    }
}
