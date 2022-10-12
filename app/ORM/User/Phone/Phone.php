<?php

namespace App\ORM\User\Phone;

use App\ORM\User\User;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'phones';

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
        'user_id',
        'type_id',
        'number',
        'main',
        'whatsapp'
    ];

    /**
     * @var array $casts
     */
    protected $casts = [
        'user_id'   => 'integer',
        'type_id'   => 'integer',
        'main'      => 'boolean',
        'whatsapp'  => 'boolean',
    ];

    const MIN_CHARS_PHONE = 14;

    /**
     * Get state of user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function phone_type()
    {
        return $this->belongsTo( PhoneType::class );
    }

    /**
     * Todo: Accessors
     */

    /**
     * Main Get
     *
     * @return string|null
     */
    public function getMainAttribute($value)
    {
        return $value ? 'on' : null;
    }

    /**
     * Whatsapp Get
     *
     * @return string|null
     */
    public function getWhatsappAttribute($value)
    {
        return $value ? 'on' : null;
    }


    /**
     * Todo: Mutators
     */

    /**
     * Main boolean
     *
     * @param $value
     */
    public function setMainAttribute($value)
    {
        $this->attributes['main'] = $value === 'on';
    }

    /**
     * Whatsapp boolean
     *
     * @param $value
     */
    public function setWhatsappAttribute($value)
    {
        $this->attributes['whatsapp'] = $value === 'on';
    }

    /**
     * Todo: Helpers Model
     */

    /**
     * Validate Phones in array
     *
     * @param $phones
     * @return array
     */
    public static function validatePhones(array $phones): array
    {
        $phonesValidated = [];

        foreach ($phones as $phone) {

            if (false == empty($phone['number']) && strlen($phone['number']) >= self::MIN_CHARS_PHONE) {
                $phonesValidated[] = $phone;
            }
        }

        return $phonesValidated;
    }
}
