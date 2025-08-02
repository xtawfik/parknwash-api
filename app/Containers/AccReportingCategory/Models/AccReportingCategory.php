<?php

namespace App\Containers\AccReportingCategory\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccReportingCategoryType\Models\AccReportingCategoryType;


class AccReportingCategory extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'category_id',
		 'name_en',
		 'name_ar'
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
    protected $resourceKey = 'accreportingcategories';
    protected $table = 'acc_reporting_category';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(AccReportingCategoryType::class, 'category_id');
    }


}

