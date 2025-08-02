<?php

namespace App\Containers\AccDivisionPlace\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivision\Models\AccDivision;


class AccDivisionPlace extends Model
{
    protected $fillable = [
      #Fillables#
		'place_id',
		 'division_id',
		 'name',
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
    protected $resourceKey = 'accdivisionplaces';
    protected $table = 'acc_division_place';

    public function place()
    {
        return $this->belongsTo(AccPlace::class, 'place_id');
    }

    public function division()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
    }


}

