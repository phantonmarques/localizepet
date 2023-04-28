<?php

namespace App\Http\Controllers\Administrator\Parameters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\SpecieRequest;
use App\ORM\Parameters\AnimalType;
use App\ORM\Parameters\Specie;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class SpecieController extends Controller
{
    public function index(): View
    {
        return view('administrator.pages.parameters.species.list', [
            'species' => Specie::all()
        ]);
    }

    public function create(): View
    {
        return view('administrator.pages.parameters.species.create', [
            'animalTypes' => AnimalType::all()
        ]);
    }

    public function store(SpecieRequest $request)
    {
        try {
            Specie::create([
                'name'           => $request->input('name'),
                'slug'           => str_slug($request->input('name')),
                'animal_type_id' => $request->input('animal_type_id'),
            ]);

            return redirect()->route('administrator.parameters.species.index')->with('success', trans('message_alert.success.create'));

        } catch (\Exception $e) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.create'));
        }
    }

    public function show(Specie $species): View
    {
        return view('administrator.pages.parameters.species.show', [
            'specie' => $species
        ]);
    }

    public function edit(Specie $species)
    {
        return view('administrator.pages.parameters.species.edit', [
            'animalTypes' => AnimalType::all(),
            'specie'      => $species,
        ]);
    }

    public function update(SpecieRequest $request, string $id)
    {
        try {
            Specie::where('id', $id)->update([
                'name'           => $request->input('name'),
                'slug'           => str_slug($request->input('name')),
                'animal_type_id' => $request->input('animal_type_id'),
            ]);

            return redirect()->route('administrator.parameters.species.index')->with('success', trans('message_alert.success.update'));

        } catch (\Exception $e) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.update'));
        }
    }

    public function destroy(string $id)
    {
        try {
            Specie::where('id', $id)->delete();

            return redirect()->route('administrator.parameters.species.index')
                ->with('success', trans('message_alert.success.delete'));

        } catch (\Exception $e) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.delete'));
        }
    }
}
