<?php

namespace App\Containers\AccInventoryWriteOff\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccItemStore\Models\AccItemStore;
use App\Containers\AccInventory\Models\AccInventory;
use App\Containers\AccBalanceSheetAccount\Models\AccBalanceSheetAccount;
use App\Containers\AccProfitLossAccount\Models\AccProfitLossAccount;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccProject\Models\AccProject;
use App\Containers\User\Models\User;
use App\Containers\AccTaxCode\Models\AccTaxCode;


class AccInventoryWriteOff extends Model
{
    protected $fillable = [
      #Fillables#
		'date',
		 'reference',
		 'description',
		 'inventory_id',
		 'balance_sheet_account_id',
		 'profit_loss_account_id',
		 'division_id',
		 'place_id',
		 'division_place_id',
		 'project_id',
		 'total',
		 'user_id',
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
    protected $resourceKey = 'accinventorywriteoffs';
    protected $table = 'acc_inventory_write_off';

    public function item_stores()
    {
        return $this->hasMany(AccItemStore::class, 'inventory_write_off_id');
    }

    public function inventory()
    {
        return $this->belongsTo(AccInventory::class, 'inventory_id');
    }

    public function balance_sheet_account()
    {
        return $this->belongsTo(AccBalanceSheetAccount::class, 'balance_sheet_account_id');
    }

    public function profit_loss_account()
    {
        return $this->belongsTo(AccProfitLossAccount::class, 'profit_loss_account_id');
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

    public function project()
    {
        return $this->belongsTo(AccProject::class, 'project_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tax_code()
    {
        return $this->belongsTo(AccTaxCode::class, 'tax_code_id');
    }


}

