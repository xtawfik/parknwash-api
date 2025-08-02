<?php

namespace App\Ship\Criterias\Eloquent;

use App\Containers\Area\Models\Area;
use App\Containers\Country\Models\Country;
use App\Containers\User\Models\User;
use App\Ship\Parents\Criterias\Criteria;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class CurrentCountryCriteria.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class AreaSupervisorCriteria extends Criteria {

  protected $relation;

  /**
   * CurrentCountryCriteria constructor.
   *
   */
  public function __construct($relation = false) {
    $this->relation = $relation;
  }

  /**
   * @param                                                   $model
   * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
   *
   * @return mixed
   */
  public function apply( $model, PrettusRepositoryInterface $repository ) {
    $user = Auth::user();
    if(!$user and request('user_id')) {
      $user = User::find(request('user_id'));
    }

    if ($user and $user->area_id) {
      $malls = Area::find($user->area_id)->malls()->pluck('id');

      $model = $model->whereIn( 'mall_id', $malls );
    }

    return $model;
  }

}
