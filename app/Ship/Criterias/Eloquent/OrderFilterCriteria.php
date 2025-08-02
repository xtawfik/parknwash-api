<?php

namespace App\Ship\Criterias\Eloquent;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class OrderFilterCriteria.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class OrderFilterCriteria extends Criteria {

  /**
   * @var int
   */
  private $countryId;

  /**
   * OrderFilterCriteria constructor.
   *
   * @param $countryId
   */
  public function __construct(  ) {

  }

  /**
   * @param                                                   $model
   * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
   *
   * @return mixed
   */
  public function apply( $model, PrettusRepositoryInterface $repository ) {

    if ( request( 'status' ) == 'active' ) {
      return $model->whereIn( 'status', ['pending', 'confirmed'] );
    }

    if ( request( 'status' ) == 'completed' ) {
      return $model->whereIn( 'status', ['completed', 'cancelled'] );
    }

    return $model;
  }

}
