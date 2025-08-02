<?php

namespace App\Containers\AccBalanceSheetAccount\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccBalanceSheet\Models\AccBalanceSheet;
use App\Containers\AccCashFlowType\Models\AccCashFlowType;
use App\Containers\AccCashFlow\Models\AccCashFlow;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccAccountCategory\Models\AccAccountCategory;
use App\Containers\AccTaxCode\Models\AccTaxCode;


class AccBalanceSheetAccount extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'name',
		 'code',
		 'balance_sheet_id',
		 'cash_flow_type_id',
		 'cash_flow_id',
		 'division_place_id',
		 'division_id',
		 'place_id',
		 'starting_balance',
		 'balance_type',
		 'description',
		 'balance',
		 'status',
		 'account_category_id',
		 'tax_code_id'
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
    protected $resourceKey = 'accbalancesheetaccounts';
    protected $table = 'acc_balance_sheet_account';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function balance_sheet()
    {
        return $this->belongsTo(AccBalanceSheet::class, 'balance_sheet_id');
    }

    public function cash_flow_type()
    {
        return $this->belongsTo(AccCashFlowType::class, 'cash_flow_type_id');
    }

    public function cash_flow()
    {
        return $this->belongsTo(AccCashFlow::class, 'cash_flow_id');
    }

    public function division()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
    }

    public function place()
    {
        return $this->belongsTo(AccPlace::class, 'place_id');
    }

    public function division_place()
    {
        return $this->belongsTo(AccDivisionPlace::class, 'division_place_id');
    }

    public function account_category()
    {
        return $this->belongsTo(AccAccountCategory::class, 'account_category_id');
    }

    public function tax_code()
    {
        return $this->belongsTo(AccTaxCode::class, 'tax_code_id');
    }


}

