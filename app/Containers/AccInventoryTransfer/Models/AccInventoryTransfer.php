<?php

namespace App\Containers\AccInventoryTransfer\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccInventoryItem\Models\AccInventoryItem;
use App\Containers\AccItemStore\Models\AccItemStore;
use App\Containers\AccInventory\Models\AccInventory;
use App\Containers\User\Models\User;


class AccInventoryTransfer extends Model
{
    protected $fillable = [
      #Fillables#
		'date',
		 'reference',
		 'from_inventory_id',
		 'to_inventory_id',
		 'description',
		 'total',
		 'quantity',
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
    protected $resourceKey = 'accinventorytransfers';
    protected $table = 'acc_inventory_transfer';

    public function inventory_items()
    {
        return $this->belongsToMany(AccInventoryItem::class, 'inventory_transfer_id', 'inventory_item_id', 'item_store_id');
    }

    public function item_stores()
    {
        return $this->hasMany(AccItemStore::class, 'inventory_transfer_id');
    }

    public function from_inventory()
    {
        return $this->belongsTo(AccInventory::class, 'from_inventory_id');
    }

    public function to_inventory()
    {
        return $this->belongsTo(AccInventory::class, 'to_inventory_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

