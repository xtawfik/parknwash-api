<?php

namespace App\Containers\AccProductionOrder\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccInventory\Models\AccInventory;
use App\Containers\AccInventoryItem\Models\AccInventoryItem;
use App\Containers\AccItemStore\Models\AccItemStore;
use App\Containers\AccProductionCost\Models\AccProductionCost;
use App\Containers\User\Models\User;


class AccProductionOrder extends Model
{
    protected $fillable = [
      #Fillables#
		'date',
		 'reference',
		 'description',
		 'inventory_id',
		 'finished_item_id',
		 'quantity',
		 'status',
		 'production_cost',
		 'total',
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
    protected $resourceKey = 'accproductionorders';
    protected $table = 'acc_production_order';

    public function inventory()
    {
        return $this->belongsTo(AccInventory::class, 'inventory_id');
    }

    public function finished_item()
    {
        return $this->belongsTo(AccInventoryItem::class, 'finished_item_id');
    }

    public function item_stores()
    {
        return $this->hasMany(AccItemStore::class, 'production_order_id');
    }

    public function accounts()
    {
        return $this->hasMany(AccProductionCost::class, 'production_order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

