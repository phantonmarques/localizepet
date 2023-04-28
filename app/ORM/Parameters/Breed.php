<?php

namespace App\ORM\Parameters;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
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
        'specie_id'
    ];

    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }
}
