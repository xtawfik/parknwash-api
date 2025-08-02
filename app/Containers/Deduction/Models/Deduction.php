<?php

namespace App\Containers\Deduction\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Mall\Models\Mall;
use App\Containers\Employee\Models\Employee;
use App\Containers\DeductionType\Models\DeductionType;
use App\Containers\Account\Models\Account;


class Deduction extends Model
{
    protected $fillable = [
      #Fillables#
		'country_id',
		 'mall_id',
		 'employee_id',
		 'account_id',
		 'type_id',
		 'amount',
		 'date',
		 'status',
		 'notes',
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
    protected $resourceKey = 'deductions';
    protected $table = 'deduction';

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function type()
    {
        return $this->belongsTo(DeductionType::class, 'type_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }


}

