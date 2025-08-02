<?php

namespace App\Containers\Option\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\OptionCategory\Models\OptionCategory;


class Option extends Model
{
    protected $fillable = [
      #Fillables#
		'option_category_id',
		 'name_en',
		 'name_ar',
		 'description_en',
		 'description_ar'
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
    protected $resourceKey = 'options';
    protected $table = 'option';

    public function option_category()
    {
        return $this->belongsTo(OptionCategory::class, 'option_category_id');
    }


}

