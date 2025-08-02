<?php

namespace App\Containers\AccProfitLossAccount\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccProfitLoss\Models\AccProfitLoss;
use App\Containers\User\Models\User;
use App\Containers\AccCashFlow\Models\AccCashFlow;
use App\Containers\AccCashFlowType\Models\AccCashFlowType;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccAccountCategory\Models\AccAccountCategory;
use App\Containers\AccTaxCode\Models\AccTaxCode;


class AccProfitLossAccount extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'name',
		 'code',
		 'profit_loss_id',
		 'cash_flow_type_id',
		 'cash_flow_id',
		 'description',
		 'status',
		 'division_id',
		 'place_id',
		 'division_place_id',
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
    protected $resourceKey = 'accprofitlossaccounts';
    protected $table = 'acc_profit_loss_account';

    public function profit_loss()
    {
        return $this->belongsTo(AccProfitLoss::class, 'profit_loss_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cash_flow()
    {
        return $this->belongsTo(AccCashFlow::class, 'cash_flow_id');
    }

    public function cash_flow_type()
    {
        return $this->belongsTo(AccCashFlowType::class, 'cash_flow_type_id');
    }

    public function division_place()
    {
        return $this->belongsTo(AccDivisionPlace::class, 'division_place_id');
    }

    public function place()
    {
        return $this->belongsTo(AccPlace::class, 'place_id');
    }

    public function division()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
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

