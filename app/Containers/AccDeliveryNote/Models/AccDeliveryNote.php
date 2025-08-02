<?php

namespace App\Containers\AccDeliveryNote\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccCustomer\Models\AccCustomer;
use App\Containers\AccSalesOrder\Models\AccSalesOrder;
use App\Containers\AccSalesInvoice\Models\AccSalesInvoice;
use App\Containers\User\Models\User;
use App\Containers\AccInventory\Models\AccInventory;
use App\Containers\AccItem\Models\AccItem;
use App\Containers\AccFooter\Models\AccFooter;


class AccDeliveryNote extends Model
{
    protected $fillable = [
      #Fillables#
		'date',
		 'reference',
		 'sales_order_id',
		 'sales_invoice_id',
		 'customer_id',
		 'inventory_id',
		 'user_id',
		 'description',
		 'quantity',
		 'delivery_address',
		 'title',
		 'footer_id'
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
    protected $resourceKey = 'accdeliverynotes';
    protected $table = 'acc_delivery_note';

    public function customer()
    {
        return $this->belongsTo(AccCustomer::class, 'customer_id');
    }

    public function sales_order()
    {
        return $this->belongsTo(AccSalesOrder::class, 'sales_order_id');
    }

    public function sales_invoice()
    {
        return $this->belongsTo(AccSalesInvoice::class, 'sales_invoice_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function inventory()
    {
        return $this->belongsTo(AccInventory::class, 'inventory_id');
    }

    public function items()
    {
        return $this->hasMany(AccItem::class, 'delivery_note_id');
    }

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }


}

