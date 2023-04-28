<?php

namespace App\Http\Controllers\Administrator\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\RoleRequest;
use App\ORM\User\Permission;
use App\ORM\User\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function index(): View
    {
        return view('administrator.pages.roles.list')->with([
            'roles' => Role::with('permissions')->get()
        ]);
    }

    public function create(): View
    {
        return view('administrator.pages.roles.create')->with([
            'permissions' => Permission::all()
        ]);
    }

    public function store(RoleRequest $request)
    {
        try {
            DB::beginTransaction();

            $role = Role::create([
                'name' => $request->input('name'),
                'slug' => str_slug($request->input('name'))
            ]);

            $role->permissions()->attach($request->input('permissions'));

            DB::commit();

            return redirect()->route('administrator.roles.index')->with('success', trans('message_alert.success.create'));

        } catch (\Exception $e) {

            DB::rollBack();

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.create'));
        }
    }

    public function show(Role $role): View
    {
        $rolePermissions = $this->isRoleAdmin($role->id) ? Permission::all()->toArray() : $role->permissions->toArray();

        return view('administrator.pages.roles.show')->with([
            'role'              => $role,
            'rolePermissions'   => $rolePermissions
        ]);
    }

    private function isRoleAdmin($roleId): bool
    {
        return $roleId == Role::ID_ADMINISTRATOR;
    }

    public function edit(Role $role): View
    {
        return view('administrator.pages.roles.edit')->with([
            'permissions'       => Permission::all(),
            'role'              => $role,
            'rolePermissions'   => $role->permissions->pluck('id')->toArray()
        ]);
    }

    public function update(RoleRequest $request, Role $role)
    {
        try {
            DB::beginTransaction();

            $role->update([
                'name' => $request->input('name'),
                'slug' => str_slug($request->input('name'))
            ]);

            $role->permissions()->sync($request->input('permissions'));

            DB::commit();

            return redirect()->route('administrator.roles.index')->with('success', trans('message_alert.success.update'));

        } catch (\Exception $e) {

            DB::rollBack();

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.update'));
        }
    }

    public function destroy(string $id)
    {
        try {
            Role::where('id', $id)->delete();

            return redirect()->route('administrator.roles.index')->with('success', trans('message_alert.success.delete'));

        } catch (\Exception $e) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', trans('message_alert.error.delete'));
        }
    }
}
