<?php

namespace App\Containers\Attachment\Models;

use App\Ship\Parents\Models\Model;

#use#

class Attachment extends Model
{
    protected $fillable = [
      #Fillables#
		'name',
		 'employee_id'
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
    protected $resourceKey = 'attachments';
    protected $table = 'attachment';

    #relations#
}

