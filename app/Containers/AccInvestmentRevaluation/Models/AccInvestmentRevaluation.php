<?php

namespace App\Containers\AccInvestmentRevaluation\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccInvestmentRevaluationItem\Models\AccInvestmentRevaluationItem;
use App\Containers\User\Models\User;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccFixedAsset\Models\AccFixedAsset;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;


class AccInvestmentRevaluation extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'date',
		 'reference',
		 'description',
		 'fixed_asset_id',
		 'realized_gain',
		 'division_id',
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
    protected $resourceKey = 'accinvestmentrevaluations';
    protected $table = 'acc_investment_revaluation';

    public function items()
    {
        return $this->hasMany(AccInvestmentRevaluationItem::class, 'investment_revaluation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function division()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
    }

    public function fixed_asset()
    {
        return $this->belongsTo(AccFixedAsset::class, 'fixed_asset_id');
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

