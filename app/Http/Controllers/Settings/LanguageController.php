<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class LanguageController extends Controller
{
    public function edit(): View
    {
        return view('settings.language');
    }
}
