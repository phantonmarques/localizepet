<?php

namespace App\ORM\Auth;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions()
    {
        return $this->belongsTo(Permission::class, 'roles_permissions');
    }
}
