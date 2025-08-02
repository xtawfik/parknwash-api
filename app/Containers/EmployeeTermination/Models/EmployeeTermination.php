<?php

namespace App\Containers\EmployeeTermination\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\ReasonToLeave\Models\ReasonToLeave;
use App\Containers\Employee\Models\Employee;
use App\Containers\Mall\Models\Mall;


class EmployeeTermination extends Model
{
    protected $fillable = [
      #Fillables#
		'country_id',
		 'mall_id',
		 'employee_id',
		 'reason_id',
		 'date',
		 'bonus',
		 'notes_en',
		 'notes_ar'
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
    protected $resourceKey = 'employeeterminations';
    protected $table = 'employee_termination';

    public function reason()
    {
        return $this->belongsTo(ReasonToLeave::class, 'reason_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }


}

