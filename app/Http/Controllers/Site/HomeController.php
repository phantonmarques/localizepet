<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('site.pages.home');
    }

    public function create(): View
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id): View
    {
        //
    }

    public function edit($id): View
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
