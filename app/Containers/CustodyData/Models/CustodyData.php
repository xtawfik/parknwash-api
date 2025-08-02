<?php

namespace App\Containers\CustodyData\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\CustodyCategory\Models\CustodyCategory;


class CustodyData extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar',
		 'category_id'
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
    protected $resourceKey = 'custodydatas';
    protected $table = 'custody_data';

    public function category()
    {
        return $this->belongsTo(CustodyCategory::class, 'category_id');
    }


}

