<?php

namespace App\Containers\AccNonInventoryItem\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccBalanceSheetAccount\Models\AccBalanceSheetAccount;
use App\Containers\AccProfitLossAccount\Models\AccProfitLossAccount;
use App\Containers\AccTaxCode\Models\AccTaxCode;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivision\Models\AccDivision;


class AccNonInventoryItem extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'name_ar',
		 'name_en',
		 'unit_name_en',
		 'unit_name_ar',
		 'sold_balance_sheet_account_id',
		 'purchased_balance_sheet_account_id',
		 'sold_profit_loss_account_id',
		 'purchased_profit_loss_account_id',
		 'description',
		 'sales_price',
		 'purchase_price',
		 'tax_code_id',
		 'division_place_id',
		 'place_id',
		 'division_id',
		 'status',
		 'unit_price'
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
    protected $resourceKey = 'accnoninventoryitems';
    protected $table = 'acc_non_inventory_item';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sold_balance_sheet_account()
    {
        return $this->belongsTo(AccBalanceSheetAccount::class, 'sold_balance_sheet_account_id');
    }

    public function purchased_balance_sheet_account()
    {
        return $this->belongsTo(AccBalanceSheetAccount::class, 'purchased_balance_sheet_account_id');
    }

    public function purchased_profit_loss_account()
    {
        return $this->belongsTo(AccProfitLossAccount::class, 'purchased_profit_loss_account_id');
    }

    public function sold_profit_loss_account()
    {
        return $this->belongsTo(AccProfitLossAccount::class, 'sold_profit_loss_account_id');
    }

    public function tax_code()
    {
        return $this->belongsTo(AccTaxCode::class, 'tax_code_id');
    }

    public function division_place()
    {
        return $this->belongsTo(AccDivisionPlace::class, 'division_place_id');
    }

    public function place_id()
    {
        return $this->belongsTo(AccPlace::class, 'place_id');
    }

    public function division()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
    }


}

