<?php

namespace App\ORM\User\Phone;

use Illuminate\Database\Eloquent\Model;

class PhoneType extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'phone_types';

    /**
     * @var array $hidden
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'name',
        'slug'
    ];

    const FIXO = 1;
    const CELULAR = 2;
}
