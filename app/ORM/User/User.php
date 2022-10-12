<?php

namespace App\ORM\User;

use App\ORM\Banner\Banner;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Traits\PermissionsTrait;
use App\ORM\Location\City;
use App\ORM\User\Phone\Phone;

class User extends Authenticatable
{
    use Notifiable, PermissionsTrait, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'city_id',
        'profile_picture',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // TODO: RelationShip

    /**
     * List City of relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * List Phones of relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    /**
     * List Roles of relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * List userEmailVerify of relationship
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function userEmailVerify()
    {
        return $this->hasOne(UserEmailVerify::class);
    }

    /**
     * List Banners of relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function banners()
    {
        return $this->hasMany(Banner::class);
    }

    // TODO: Mutators

    /**
     * Encrypting password user before save
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value ? bcrypt($value) : $this->password;
    }

    // TODO: Helpers

    /**
     * Determine if the user has verified their email address.
     *
     * @return bool
     */
    public function hasVerifiedEmail()
    {
        return false === is_null($this->email_verified_at);
    }
}
