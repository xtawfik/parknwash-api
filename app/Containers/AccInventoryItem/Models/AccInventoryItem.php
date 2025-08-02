<?php

namespace App\Containers\AccInventoryItem\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccInventoryItemAmount\Models\AccInventoryItemAmount;
use App\Containers\AccInventory\Models\AccInventory;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccControlAccount\Models\AccControlAccount;
use App\Containers\AccProfitLossAccount\Models\AccProfitLossAccount;
use App\Containers\AccTaxCode\Models\AccTaxCode;
use App\Containers\User\Models\User;


class AccInventoryItem extends Model
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
    'divison_place_id',
    'control_account_id',
    'production_stage',
    'quantity_desired',
    'receive',
    'deliver',
    'income_account_id',
    'expense_account_id',
    'description_en',
    'description_ar',
    'purchase_price',
    'unit_price',
    'sales_division_id',
    'sales_place_id',
    'sales_division_place_id',
    'tax_code_id',
    'hide_name',
    'average_cost',
    'total_quantity',
    'quantity_on_hand',
    'quantity_to_deliver',
    'quantity_available',
    'quantity_to_receive',
    'quantity_be_available',
    'quantity_to_order',
    'obsolete_quantity_to_receive',
    'obsolete_quantity_to_deliver',
    'obsolete_quantity_on_hand',
    'quantity_owned',
    'total_cost',
    'user_id',
    'status',
    'sales_price'
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
  protected $resourceKey = 'accinventoryitems';
  protected $table = 'acc_inventory_item';

  public function amounts()
  {
    return $this->hasMany(AccInventoryItemAmount::class, 'inventory_item_id');
  }

  public function inventories()
  {
    return $this->belongsToMany(AccInventory::class, 'inventory_item_id', 'inventory_id', 'inventory_item_amount_id');
  }

//  public function inventories()
//  {
//    return $this->belongsToMany(AccInventory::class, 'inventory_item_id', 'inventory_id', 'item_store_id');
//  }

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

  public function control_account()
  {
    return $this->belongsTo(AccControlAccount::class, 'control_account_id');
  }

  public function income_account()
  {
    return $this->belongsTo(AccProfitLossAccount::class, 'income_account_id');
  }

  public function expense_account()
  {
    return $this->belongsTo(AccProfitLossAccount::class, 'expense_account_id');
  }

  public function tax_code()
  {
    return $this->belongsTo(AccTaxCode::class, 'tax_code_id');
  }

  public function sales_division()
  {
    return $this->belongsTo(AccDivision::class, 'sales_division_id');
  }

  public function sales_division_place()
  {
    return $this->belongsTo(AccDivisionPlace::class, 'sales_division_place_id');
  }

  public function sales_place()
  {
    return $this->belongsTo(AccPlace::class, 'sales_place_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }


}

