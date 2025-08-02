<?php

namespace App\Containers\Attendees\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Country\Models\Country;
use App\Containers\Mall\Models\Mall;
use App\Containers\Employee\Models\Employee;


class Attendees extends Model
{
    protected $fillable = [
      #Fillables#
		'country_id',
		 'mall_id',
		 'employee_id',
		 'date',
		 'type'
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
    protected $resourceKey = 'attendees';
    protected $table = 'attendees';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }


}

