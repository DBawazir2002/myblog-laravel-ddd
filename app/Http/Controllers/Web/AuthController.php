<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Domain\Dashboard\Auth\Sessions\LoginAction;
use Domain\Dashboard\Auth\Sessions\LogoutAction;
use Domain\Dashboard\DataTransferToObject\Auth\LoginData;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login(LoginData $data, LoginAction $action): RedirectResponse
    {
        $action($data);
        return redirect()->intended(route('dashboard.index', absolute: false));
    }

    public function logout(LogoutAction $action): RedirectResponse
    {
        $action();
        return redirect('/');
    }
}
