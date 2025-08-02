<?php

namespace App\Containers\Custody\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Mall\Models\Mall;
use App\Containers\Employee\Models\Employee;
use App\Containers\CustodyCategory\Models\CustodyCategory;
use App\Containers\CustodyData\Models\CustodyData;


class Custody extends Model
{
    protected $fillable = [
      #Fillables#
		'country_id',
		 'mall_id',
		 'employee_id',
		 'category_id',
		 'data_id',
		 'notes_en',
		 'notes_ar',
		 'number',
		 'date',
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
    protected $resourceKey = 'custodies';
    protected $table = 'custody';

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function category()
    {
        return $this->belongsTo(CustodyCategory::class, 'category_id');
    }

    public function data()
    {
        return $this->belongsTo(CustodyData::class, 'data_id');
    }


}

