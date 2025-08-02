<?php

namespace App\Containers\AccPayslipDeduction\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccPayslipItem\Models\AccPayslipItem;
use App\Containers\AccPayslip\Models\AccPayslip;
use App\Containers\AccRecurringTransaction\Models\AccRecurringTransaction;


class AccPayslipDeduction extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'payslip_id',
		 'payslip_item_id',
		 'division_id',
		 'place_id',
		 'division_place_id',
		 'description',
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
    protected $resourceKey = 'accpayslipdeductions';
    protected $table = 'acc_payslip_deduction';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function division_place()
    {
        return $this->belongsTo(AccDivisionPlace::class, 'division_place_id');
    }

    public function place_id()
    {
        return $this->belongsTo(AccPlace::class, 'place_id');
    }

    public function division_id()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
    }

    public function payslip_item()
    {
        return $this->belongsTo(AccPayslipItem::class, 'payslip_item_id');
    }

    public function payslip()
    {
        return $this->belongsTo(AccPayslip::class, 'payslip_id');
    }

    public function recurring_transaction()
    {
        return $this->belongsTo(AccRecurringTransaction::class, 'recurring_transaction_id');
    }


}

