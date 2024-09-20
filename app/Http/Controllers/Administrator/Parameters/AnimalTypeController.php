<?php

namespace App\Http\Controllers\Administrator\Parameters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\AnimalTypeRequest;
use App\ORM\Parameters\AnimalType;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AnimalTypeController extends Controller
{

    public function index(): View
    {
        return view('administrator.pages.parameters.animal-types.list', [
            'animalTypes' => AnimalType::all()
        ]);
    }

    public function create(): View
    {
        return view('administrator.pages.parameters.animal-types.create');
    }

    public function store(AnimalTypeRequest $request)
    {
        try {
            AnimalType::create([
                'name' => $request->input('name'),
                'slug' => str_slug($request->input('name'))
            ]);

            return redirect()->route('administrator.parameters.animal-types.index')->with('success', trans('message_alert.success.create'));

        } catch (\Exception $e) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.create'));
        }
    }

    public function edit($id): View
    {
        return view('administrator.pages.parameters.animal-types.edit', [
            'animalType' => AnimalType::findOrFail($id)
        ]);
    }

    public function update(AnimalTypeRequest $request, string $id)
    {
        try {
            AnimalType::where('id', $id)->update([
                'name' => $request->input('name'),
                'slug' => str_slug($request->input('name'))
            ]);

            return redirect()->route('administrator.parameters.animal-types.index')->with('success', trans('message_alert.success.update'));

        } catch (\Exception $e) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.update'));
        }
    }

    public function destroy(string $id)
    {
        try {
            AnimalType::where('id', $id)->delete();

            return redirect()->route('administrator.parameters.animal-types.index')
                ->with('success', trans('message_alert.success.delete'));

        } catch (\Exception $e) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.delete'));
        }
    }
}
