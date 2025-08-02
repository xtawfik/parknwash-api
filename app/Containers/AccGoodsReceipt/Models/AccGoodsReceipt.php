<?php

namespace App\Containers\AccGoodsReceipt\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccPurchaseInvoice\Models\AccPurchaseInvoice;
use App\Containers\AccSupplier\Models\AccSupplier;
use App\Containers\AccPurchaseOrder\Models\AccPurchaseOrder;
use App\Containers\AccInventory\Models\AccInventory;
use App\Containers\AccItem\Models\AccItem;
use App\Containers\AccFooter\Models\AccFooter;


class AccGoodsReceipt extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'date',
		 'reference',
		 'purchase_order_id',
		 'purchase_invoice_id',
		 'supplier_id',
		 'inventory_id',
		 'description',
		 'quantity',
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
    protected $resourceKey = 'accgoodsreceipts';
    protected $table = 'acc_goods_receipt';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function purchase_invoice()
    {
        return $this->belongsTo(AccPurchaseInvoice::class, 'purchase_invoice_id');
    }

    public function supplier()
    {
        return $this->belongsTo(AccSupplier::class, 'supplier_id');
    }

    public function purchase_order()
    {
        return $this->belongsTo(AccPurchaseOrder::class, 'purchase_order_id');
    }

    public function inventory()
    {
        return $this->belongsTo(AccInventory::class, 'inventory_id');
    }

    public function items()
    {
        return $this->hasMany(AccItem::class, 'goods_receipt_id');
    }

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }


}

