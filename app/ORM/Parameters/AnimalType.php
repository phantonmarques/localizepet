<?php

namespace App\ORM\Parameters;

use Illuminate\Database\Eloquent\Model;

class AnimalType extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }
}
