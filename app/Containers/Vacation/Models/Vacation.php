<?php

namespace App\Containers\Vacation\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Employee\Models\Employee;
use App\Containers\VacationType\Models\VacationType;


class Vacation extends Model
{
    protected $fillable = [
      #Fillables#
		'country_id',
		 'mall_id',
		 'employee_id',
		 'type_id',
		 'start_at',
		 'end_at',
		 'status',
		 'application_date',
		 'amount'
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
    protected $resourceKey = 'vacations';
    protected $table = 'vacation';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function type()
    {
        return $this->belongsTo(VacationType::class, 'type_id');
    }


}

