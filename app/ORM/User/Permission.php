<?php

namespace App\ORM\User;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * @var array $fillable
     */
    protected $fillable = [
        'name',
        'slug'
    ];

    /*
     * RelationShips
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }
}
