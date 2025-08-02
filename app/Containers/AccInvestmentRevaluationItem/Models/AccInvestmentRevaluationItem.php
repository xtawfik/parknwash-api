<?php

namespace App\Containers\AccInvestmentRevaluationItem\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccInvestmentRevaluation\Models\AccInvestmentRevaluation;
use App\Containers\User\Models\User;
use App\Containers\AccInvestment\Models\AccInvestment;


class AccInvestmentRevaluationItem extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'investment_id',
		 'realized_gain',
		 'investment_revaluation_id'
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
    protected $resourceKey = 'accinvestmentrevaluationitems';
    protected $table = 'acc_investment_revaluation_item';

    public function investment_revaluation()
    {
        return $this->belongsTo(AccInvestmentRevaluation::class, 'investment_revaluation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function investment()
    {
        return $this->belongsTo(AccInvestment::class, 'investment_id');
    }


}

