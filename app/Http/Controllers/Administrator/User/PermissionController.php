<?php

namespace App\Http\Controllers\Administrator\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\PermissionRequest;
use App\ORM\User\Permission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('administrator.pages.permissions.list')->with([
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('administrator.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissionRequest $request)
    {
        try {
            Permission::create([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name'))
            ]);

            return redirect()->route('administrator.permissions.index')->with('success', trans('message_alert.success.create'));

        } catch (\Exception $exception) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exceptionString($exception));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.create'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Permission $permission
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Permission $permission)
    {
        return view('administrator.pages.permissions.edit')->with([
            'permission' => $permission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PermissionRequest $request
     * @param $permissionId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PermissionRequest $request, $permissionId)
    {
        try {
            Permission::where('id', $permissionId)->update([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name'))
            ]);

            return redirect()->route('administrator.permissions.index')->with('success', trans('message_alert.success.update'));

        } catch (\Exception $exception) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exceptionString($exception));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.update'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $permissionId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($permissionId)
    {
        try {
            Permission::where('id', $permissionId)->delete();

            return redirect()->route('administrator.permissions.index')
                ->with('success', trans('message_alert.success.delete'));

        } catch (\Exception $exception) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exceptionString($exception));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.delete'));
        }
    }
}
