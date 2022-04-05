<?php

namespace App\Utils;

use Illuminate\Support\Facades\Auth;

class Utility
{
    public const home = '/home';
    public const welcome = '/';

    // check if user is admin
    public function isAdmin()
    {
        return Auth::user()->isAdmin;
    }
}
