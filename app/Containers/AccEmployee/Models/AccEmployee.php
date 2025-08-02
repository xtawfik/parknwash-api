<?php

namespace App\Containers\AccEmployee\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\Employee\Models\Employee;
use App\Containers\AccCurrency\Models\AccCurrency;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccControlAccount\Models\AccControlAccount;


class AccEmployee extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'employee_id',
		 'currency_id',
		 'division_id',
		 'division_place_id',
		 'place_id',
		 'control_account_id',
		 'address',
		 'starting_balance_type',
		 'starting_balance',
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
    protected $resourceKey = 'accemployees';
    protected $table = 'acc_employee';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function currency()
    {
        return $this->belongsTo(AccCurrency::class, 'currency_id');
    }

    public function division()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
    }

    public function division_place()
    {
        return $this->belongsTo(AccDivisionPlace::class, 'division_place_id');
    }

    public function place()
    {
        return $this->belongsTo(AccPlace::class, 'place_id');
    }

    public function control_account()
    {
        return $this->belongsTo(AccControlAccount::class, 'control_account_id');
    }


}

