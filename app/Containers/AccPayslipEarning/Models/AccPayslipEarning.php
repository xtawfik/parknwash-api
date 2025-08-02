<?php

namespace App\Containers\AccPayslipEarning\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccPayslip\Models\AccPayslip;
use App\Containers\AccPayslipItem\Models\AccPayslipItem;
use App\Containers\AccProject\Models\AccProject;
use App\Containers\AccRecurringTransaction\Models\AccRecurringTransaction;


class AccPayslipEarning extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'payslip_id',
		 'payslip_item_id',
		 'place_id',
		 'division_id',
		 'division_place_id',
		 'project_id',
		 'description',
		 'unit_number',
		 'unit_price',
		 'amount',
		 'recurring_transaction_id'
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
    protected $resourceKey = 'accpayslipearnings';
    protected $table = 'acc_payslip_earning';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function division_place()
    {
        return $this->belongsTo(AccDivisionPlace::class, 'division_place_id');
    }

    public function division()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
    }

    public function place()
    {
        return $this->belongsTo(AccPlace::class, 'place_id');
    }

    public function payslip()
    {
        return $this->belongsTo(AccPayslip::class, 'payslip_id');
    }

    public function payslip_item()
    {
        return $this->belongsTo(AccPayslipItem::class, 'payslip_item_id');
    }

    public function project()
    {
        return $this->belongsTo(AccProject::class, 'project_id');
    }

    public function recurring_transaction()
    {
        return $this->belongsTo(AccRecurringTransaction::class, 'recurring_transaction_id');
    }


}

