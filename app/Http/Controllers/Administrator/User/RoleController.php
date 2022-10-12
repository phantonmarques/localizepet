<?php

namespace App\Http\Controllers\Administrator\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\RoleRequest;
use App\ORM\User\Permission;
use App\ORM\User\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();

        return view('administrator.pages.roles.list')->with([
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('administrator.pages.roles.create')->with([
            'permissions' => $permissions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        try {
            DB::beginTransaction();

            $role = Role::create([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name'))
            ]);

            $role->permissions()->attach($request->input('permissions'));

            DB::commit();

            return redirect()->route('administrator.roles.index')->with('success', trans('message_alert.success.create'));

        } catch (\Exception $exception) {

            DB::rollBack();

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exceptionString($exception));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Role $role)
    {
        if ($role->id == Role::ID_ADMINISTRATOR) {
            $rolePermissions = Permission::all()->toArray();
        } else {
            $rolePermissions = $role->permissions->toArray();
        }

        return view('administrator.pages.roles.show')->with([
            'role'              => $role,
            'rolePermissions'   => $rolePermissions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('administrator.pages.roles.edit')->with([
            'permissions'       => $permissions,
            'role'              => $role,
            'rolePermissions'   => $rolePermissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleRequest $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleRequest $request, Role $role)
    {
        try {
            DB::beginTransaction();

            $role->update([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name'))
            ]);

            $role->permissions()->sync($request->input('permissions'));

            DB::commit();

            return redirect()->route('administrator.roles.index')->with('success', trans('message_alert.success.update'));

        } catch (\Exception $exception) {

            DB::rollBack();

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exceptionString($exception));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.update'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $roleId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($roleId)
    {
        try {
            Role::where('id', $roleId)->delete();

            return redirect()->route('administrator.roles.index')->with('success', trans('message_alert.success.delete'));

        } catch (\Exception $exception) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exceptionString($exception));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.delete'));
        }
    }
}
