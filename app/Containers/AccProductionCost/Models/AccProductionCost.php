<?php

namespace App\Containers\AccProductionCost\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccProfitLossAccount\Models\AccProfitLossAccount;
use App\Containers\AccBalanceSheetAccount\Models\AccBalanceSheetAccount;
use App\Containers\AccProductionOrder\Models\AccProductionOrder;
use App\Containers\User\Models\User;


class AccProductionCost extends Model
{
    protected $fillable = [
      #Fillables#
		'balance_sheet_account_id',
		 'profit_loss_accoun_id',
		 'amount',
		 'production_order_id',
		 'division_id',
		 'place_id',
		 'division_place_id',
		 'user_id'
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
    protected $resourceKey = 'accproductioncosts';
    protected $table = 'acc_production_cost';

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

    public function profit_loss_accoun()
    {
        return $this->belongsTo(AccProfitLossAccount::class, 'profit_loss_accoun_id');
    }

    public function balance_sheet_account()
    {
        return $this->belongsTo(AccBalanceSheetAccount::class, 'balance_sheet_account_id');
    }

    public function production_order()
    {
        return $this->belongsTo(AccProductionOrder::class, 'production_order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

