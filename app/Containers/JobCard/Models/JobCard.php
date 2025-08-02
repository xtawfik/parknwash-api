<?php

namespace App\Containers\JobCard\Models;

use App\Containers\Employee\Models\Employee;
use App\Containers\Mall\Models\Mall;
use App\Containers\Park\Models\Park;
use App\Ship\Parents\Models\Model;

#use#

class JobCard extends Model
{
  protected $fillable = [
    #Fillables#
    'employee_id',
    'date',
    'total_money',
    'total_cars',
    'mall_id',
    'park_id',
    'mat_covers',
    'seat_covers',
    'steering_covers',
    'gear_covers',
    'hand_covers',
    'garbage_bags',
    'tissue_boxes',
    'water_bottles',
    'air_fresheners',
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
  protected $resourceKey = 'jobcards';
  protected $table = 'job_card';

  #relations#
  public function employee()
  {
    return $this->belongsTo(Employee::class, 'employee_id');
  }

  public function mall()
  {
    return $this->belongsTo(Mall::class, 'mall_id');
  }

  public function park()
  {
    return $this->belongsTo(Park::class, 'park_id');
  }
}

