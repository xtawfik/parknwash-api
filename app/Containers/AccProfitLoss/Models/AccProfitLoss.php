<?php

namespace App\Containers\AccProfitLoss\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccProfitLoss\Models\AccProfitLoss;
use App\Containers\User\Models\User;
use App\Containers\AccProfitLossAccount\Models\AccProfitLossAccount;
use App\Containers\AccCapitalSubAccount\Models\AccCapitalSubAccount;


class AccProfitLoss extends Model
{
    protected $fillable = [
      #Fillables#
		'name',
		 'group_type',
		 'parent_id',
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
    protected $resourceKey = 'accprofitlosses';
    protected $table = 'acc_profit_loss';

    public function parent()
    {
        return $this->belongsTo(AccProfitLoss::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function profit_loss_accounts()
    {
        return $this->hasMany(AccProfitLossAccount::class, 'profit_loss_id');
    }

    public function subaccounts()
    {
        return $this->hasMany(AccCapitalSubAccount::class, 'profit_loss_id');
    }


}

