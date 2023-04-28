<?php

namespace App\Http\Controllers\Administrator\Parameters;

use App\Http\Controllers\Controller;
use App\ORM\Parameters\Breed;
use App\ORM\Parameters\Specie;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BreedController extends Controller
{
    public function index(): View
    {
        return view('administrator.pages.parameters.breeds.list', [
            'breeds' => Breed::all()
        ]);
    }

    public function create(): View
    {
        return view('administrator.pages.parameters.breeds.create', [
            'species' => Specie::all()
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id): View
    {
        return view('administrator.pages.parameters.breeds.list', [
            'breeds' => Breed::all()
        ]);
    }

    public function edit(Breed $breed): View
    {
        return view('administrator.pages.parameters.breeds.edit', [
            'breed'   => $breed,
            'species' => Specie::all()
        ]);
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
