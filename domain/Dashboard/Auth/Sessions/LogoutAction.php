<?php

namespace Domain\Dashboard\Auth\Sessions;

use Illuminate\Support\Facades\Auth;

class LogoutAction
{
    public function __invoke(): void
    {
        Auth::guard('web')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();
    }
}
