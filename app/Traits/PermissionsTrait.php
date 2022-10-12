<?php

namespace App\Traits;

use App\ORM\User\Permission;

trait PermissionsTrait
{
    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }

    /**
     * @param $permission
     * @return bool
     */
    protected function inPermission($permission)
    {
        return boolval($this->permissions->where('slug', $permission->slug ?? $permission)->count());
    }

    /**
     * @param $permission
     * @return bool
     */
    public function inPermissionThroughRole($permission)
    {
        foreach ($permission->roles ?? [] as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $permission
     * @return bool
     */
    public function inPermissionTo($permission)
    {
        return $this->inPermissionThroughRole($permission) || $this->inPermission($permission);
    }

    /**
     * @param array $permissions
     * @return mixed
     */
    protected function getPermissions(array $permissions)
    {
        return Permission::whereIn('slug', $permissions)->get();
    }

    /**
     * @param mixed ... $permissions
     * @return $this
     */
    public function givePermissionsTo(... $permissions)
    {
        $permissions = $this->getPermissions($permissions);

        if ($permissions !== null)
            return $this;

        $this->permissions()->saveMany($permissions);

        return $this;
    }

    /**
     * @param mixed ... $permissions
     * @return $this
     */
    public function deletePermissions(... $permissions)
    {
        $permissions = $this->getPermissions($permissions);

        $this->permissions()->detach($permissions);
    }

    /**
     * @param mixed ...$permissions
     * @return PermissionsTrait
     */
    public function refreshPermissions(... $permissions)
    {
        $this->permissions()->detach();

        return $this->givePermissionsTo($permissions);
    }
}