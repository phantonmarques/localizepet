<?php

namespace App\ORM\User;

use Illuminate\Database\Eloquent\Model;

class UserEmailVerify extends Model
{
    protected $table = "users_email_verify";

    /**
     * Columns store/update
     * @var array
     */
    protected $fillable = [
        'ip',
        'token',
        'token_expires',
        'user_id',
    ];

    /**
     * List User of relationship
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
