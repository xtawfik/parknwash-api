<?php

namespace App\Ship\Criterias\Eloquent;

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
class CurrentCountryCriteria extends Criteria {

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

    if ($user and $user->current_country) {
      $countries = [$user->current_country];

      if($user->current_country == 1000) {
        $countries = Country::all()->pluck('id');
      }

      if($this->relation) {
        $relatedModel = is_string($this->relation) ? $this->relation : 'countries';
        $model = $model->whereHas($relatedModel, function ($q) use ($countries) {
          $q->whereIn('country_id', $countries);
        });
      }else{
        $model = $model->whereIn( 'country_id', $countries );
      }

    }

    return $model;
  }

}
