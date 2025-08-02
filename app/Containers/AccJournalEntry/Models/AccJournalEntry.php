<?php

namespace App\Containers\AccJournalEntry\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccFooter\Models\AccFooter;
use App\Containers\AccCurrency\Models\AccCurrency;
use App\Containers\User\Models\User;
use App\Containers\AccItem\Models\AccItem;


class AccJournalEntry extends Model
{
    protected $fillable = [
      #Fillables#
		'date',
		 'reference',
		 'currency_id',
		 'description',
		 'cash_transaction',
		 'user_id',
		 'footer_id',
		 'status',
		 'accounts',
		 'debit',
		 'credit'
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
    protected $resourceKey = 'accjournalentries';
    protected $table = 'acc_journal_entry';

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }

    public function currency()
    {
        return $this->belongsTo(AccCurrency::class, 'currency_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(AccItem::class, 'journal_entry_id');
    }


}

