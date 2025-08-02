<?php

namespace App\Containers\AccInventory\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccInventoryItem\Models\AccInventoryItem;


class AccInventory extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar',
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
    protected $resourceKey = 'accinventories';
    protected $table = 'acc_inventory';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function inventory_items()
    {
        return $this->belongsToMany(AccInventoryItem::class, 'inventory_item_id', 'inventory_id', 'inventory_item_amount_id');
    }


}

