<?php

namespace App\Containers\AccItemStore\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccInventoryItem\Models\AccInventoryItem;
use App\Containers\AccInventory\Models\AccInventory;
use App\Containers\AccInventoryTransfer\Models\AccInventoryTransfer;
use App\Containers\AccInventoryWriteOff\Models\AccInventoryWriteOff;
use App\Containers\AccProductionOrder\Models\AccProductionOrder;
use App\Containers\User\Models\User;


class AccItemStore extends Model
{
    protected $fillable = [
      #Fillables#
		'inventory_item_id',
		 'quantity',
		 'inventory_id',
		 'inventory_transfer_id',
		 'inventory_write_off_id',
		 'production_order_id',
		 'user_id',
		 'average_cost',
		 'description',
		 'inventory_kit_id'
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
    protected $resourceKey = 'accitemstores';
    protected $table = 'acc_item_store';

    public function inventory_item()
    {
        return $this->belongsTo(AccInventoryItem::class, 'inventory_item_id');
    }

    public function inventory()
    {
        return $this->belongsTo(AccInventory::class, 'inventory_id');
    }

    public function inventory_transfer()
    {
        return $this->belongsTo(AccInventoryTransfer::class, 'inventory_transfer_id');
    }

    public function inventory_write_off()
    {
        return $this->belongsTo(AccInventoryWriteOff::class, 'inventory_write_off_id');
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

