<?php

namespace App\Containers\CustodyMovement\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Custody\Models\Custody;


class CustodyMovement extends Model
{
    protected $fillable = [
      #Fillables#
		'custody_id',
		 'date',
		 'movement'
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
    protected $resourceKey = 'custodymovements';
    protected $table = 'custody_movement';

    public function custody()
    {
        return $this->belongsTo(Custody::class, 'custody_id');
    }


}

