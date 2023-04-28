<?php

namespace App\Http\Controllers\Administrator\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\PermissionRequest;
use App\ORM\User\Permission;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PermissionController extends Controller
{
    public function index(): View
    {
        return view('administrator.pages.permissions.list')->with([
            'permissions' => Permission::all()
        ]);
    }

    public function create(): View
    {
        return view('administrator.pages.permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        try {
            Permission::create([
                'name' => $request->input('name'),
                'slug' => str_slug($request->input('name'))
            ]);

            return redirect()->route('administrator.permissions.index')->with('success', trans('message_alert.success.create'));

        } catch (\Exception $e) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.create'));
        }
    }

    public function edit(Permission $permission): View
    {
        return view('administrator.pages.permissions.edit', compact('permission'));
    }

    public function update(PermissionRequest $request, string $id)
    {
        try {
            Permission::where('id', $id)->update([
                'name' => $request->input('name'),
                'slug' => str_slug($request->input('name'))
            ]);

            return redirect()->route('administrator.permissions.index')->with('success', trans('message_alert.success.update'));

        } catch (\Exception $e) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.update'));
        }
    }

    public function destroy(string $id)
    {
        try {
            Permission::where('id', $id)->delete();

            return redirect()->route('administrator.permissions.index')
                ->with('success', trans('message_alert.success.delete'));

        } catch (\Exception $e) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.delete'));
        }
    }
}
