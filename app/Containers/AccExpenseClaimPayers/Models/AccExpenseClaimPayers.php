<?php

namespace App\Containers\AccExpenseClaimPayers\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\User\Models\User;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;


class AccExpenseClaimPayers extends Model
{
    protected $fillable = [
      #Fillables#
		'name',
		 'balance_type',
		 'starting_balance',
		 'division_id',
		 'user_id',
		 'status',
		 'place_id',
		 'division_place_id'
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
    protected $resourceKey = 'accexpenseclaimpayers';
    protected $table = 'acc_expense_claim_payers';

    public function division()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function place()
    {
        return $this->belongsTo(AccPlace::class, 'place_id');
    }

    public function division_place()
    {
        return $this->belongsTo(AccDivisionPlace::class, 'division_place_id');
    }


}

