<?php

namespace App\Containers\AccFooter\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccFooterCategory\Models\AccFooterCategory;


class AccFooter extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar',
		 'content',
		 'code_editor',
		 'footer_category_id',
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
    protected $resourceKey = 'accfooters';
    protected $table = 'acc_footer';

    public function footer_category()
    {
        return $this->belongsTo(AccFooterCategory::class, 'footer_category_id');
    }


}

