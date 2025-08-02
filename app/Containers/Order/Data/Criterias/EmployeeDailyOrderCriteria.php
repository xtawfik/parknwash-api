<?php


namespace App\Containers\Order\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class EmployeeDailyOrderCriteria
 *
 * @author  Mohamed Tawfik <contact@mohamedtawfik.me>
 */
class EmployeeDailyOrderCriteria extends Criteria
{

  /**
   * @param                                                   $model
   * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
   *
   * @return mixed
   */
  public function apply($model, PrettusRepositoryInterface $repository)
  {
    $user_id = auth()->user()->id;
    $model = $model->where('user_id', $user_id);
    $model = $model->orderBy('id', 'desc');
    // Get date from request
    $date = request('date');
    if ($date) {
      $model = $model->whereDate('created_at', $date);
    }

    return $model;
  }
}
