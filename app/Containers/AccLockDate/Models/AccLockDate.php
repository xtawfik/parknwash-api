<?php

namespace App\Containers\AccLockDate\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;


class AccLockDate extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'lock_accounting_period',
		 'date'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $appends = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'acclockdates';
    protected $table = 'acc_lock_date';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

