<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function dashboard(): View
    {
        return view('administrator.pages.home');
    }
}
