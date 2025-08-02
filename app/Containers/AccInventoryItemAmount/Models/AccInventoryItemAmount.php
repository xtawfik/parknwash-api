<?php

namespace App\Containers\AccInventoryItemAmount\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccInventory\Models\AccInventory;
use App\Containers\AccInventoryItem\Models\AccInventoryItem;


class AccInventoryItemAmount extends Model
{
    protected $fillable = [
      #Fillables#
		'inventory_item_id',
		 'quantity',
		 'inventory_id',
		 'description',
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
    protected $resourceKey = 'accinventoryitemamounts';
    protected $table = 'acc_inventory_item_amount';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function inventory()
    {
        return $this->belongsTo(AccInventory::class, 'inventory_id');
    }

    public function inventory_item()
    {
        return $this->belongsTo(AccInventoryItem::class, 'inventory_item_id');
    }


}

