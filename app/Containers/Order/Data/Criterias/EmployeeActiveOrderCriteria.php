<?php


namespace App\Containers\Order\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class EmployeeActiveOrderCriteria
 *
 * @author  Mohamed Tawfik <contact@mohamedtawfik.me>
 */
class EmployeeActiveOrderCriteria extends Criteria
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
    return $model->whereIn('status', ['pending', 'confirmed']);
  }
}
