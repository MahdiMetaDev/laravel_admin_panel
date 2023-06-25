<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Session;

class LogoutController extends Controller
{
    public function perform()
    {
        Session::flush();

        Auth::logout();

        return redirect(route('auth.login'));
    }
}
