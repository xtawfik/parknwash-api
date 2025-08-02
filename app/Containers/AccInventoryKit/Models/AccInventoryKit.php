<?php

namespace App\Containers\AccInventoryKit\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccItemStore\Models\AccItemStore;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\User\Models\User;
use App\Containers\AccTaxCode\Models\AccTaxCode;
use App\Containers\AccProfitLossAccount\Models\AccProfitLossAccount;


class AccInventoryKit extends Model
{
    protected $fillable = [
      #Fillables#
		'code',
		 'name_en',
		 'name_ar',
		 'unit_name_en',
		 'unit_name_ar',
		 'division_id',
		 'place_id',
		 'division_place_id',
		 'description',
		 'sales_price',
		 'sales_division_id',
		 'sales_division_place_id',
		 'sales_place_id',
		 'tax_code_id',
		 'income_account_id',
		 'user_id',
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
    protected $resourceKey = 'accinventorykits';
    protected $table = 'acc_inventory_kit';

    public function items()
    {
        return $this->hasMany(AccItemStore::class, 'inventory_kit_id');
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sales_division_place()
    {
        return $this->belongsTo(AccDivisionPlace::class, 'sales_division_place_id');
    }

    public function sales_place()
    {
        return $this->belongsTo(AccPlace::class, 'sales_place_id');
    }

    public function sales_division()
    {
        return $this->belongsTo(AccDivision::class, 'sales_division_id');
    }

    public function tax_code()
    {
        return $this->belongsTo(AccTaxCode::class, 'tax_code_id');
    }

    public function income_account()
    {
        return $this->belongsTo(AccProfitLossAccount::class, 'income_account_id');
    }


}

