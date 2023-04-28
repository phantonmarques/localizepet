<?php

namespace App\ORM\Parameters;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
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
        'animal_type_id',
        'name',
        'slug',
    ];

    public function animal_type()
    {
        return $this->belongsTo(AnimalType::class);
    }
}
