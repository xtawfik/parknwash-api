<?php

namespace App\Ship\Criterias\Eloquent;

use App\Ship\Parents\Criterias\Criteria;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class CurrentBranchCriteria.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class CurrentBranchCriteria extends Criteria {

  protected $relation;

  /**
   * CurrentBranchCriteria constructor.
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

    if ($user and $user->branches()->count() > 0) {
      $branches = [$user->current_branch];

      if($user->current_branch == 1000) {
        $branches = $user->branches()->pluck('branch_id');
      }

      if($this->relation) {
        $relatedModel = is_string($this->relation) ? $this->relation : 'branches';
        $model = $model->whereHas($relatedModel, function ($q) use ($branches) {
          $q->whereIn('branch_id', $branches);
        });
      }else{
        $model = $model->whereIn( 'branch_id', $branches );
      }

    }

    return $model;
  }

}
