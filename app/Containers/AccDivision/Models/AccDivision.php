<?php

namespace App\Containers\AccDivision\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccPlace\Models\AccPlace;


class AccDivision extends Model
{
    protected $fillable = [
      #Fillables#
		'name',
		 'user_id',
		 'status'
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
    protected $resourceKey = 'accdivisions';
    protected $table = 'acc_division';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function places()
    {
        return $this->belongsToMany(AccPlace::class, 'acc_division_place', 'division_id', 'place_id');
    }


}

