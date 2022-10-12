<?php

namespace App\ORM\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ID_ADMINISTRATOR = 1;

    const SLUG_ADMINISTRATOR = 'administrador';

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }

    /*
     * Helpers
     */

    /**
     * @return bool
     */

    public function isAdmin(): bool
    {
        return $this->id === self::ID_ADMINISTRATOR;
    }
}
