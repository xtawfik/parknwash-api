<?php

namespace App\Containers\AccReportingCategoryType\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccReportingCategoryType\Models\AccReportingCategoryType;


class AccReportingCategoryType extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'name_en',
		 'name_ar',
		 'parent_id'
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
    protected $resourceKey = 'accreportingcategorytypes';
    protected $table = 'acc_reporting_category_type';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function types()
    {
        return $this->hasMany(AccReportingCategoryType::class, 'parent_id');
    }


}

