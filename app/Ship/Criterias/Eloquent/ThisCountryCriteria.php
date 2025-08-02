<?php

namespace App\Ship\Criterias\Eloquent;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class ThisUserCriteria.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class ThisCountryCriteria extends Criteria {

  /**
   * @var int
   */
  private $countryId;

  /**
   * ThisUserCriteria constructor.
   *
   * @param $countryId
   */
  public function __construct( $countryId = null ) {
    $this->countryId = $countryId;
  }

  /**
   * @param                                                   $model
   * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
   *
   * @return mixed
   */
  public function apply( $model, PrettusRepositoryInterface $repository ) {

    if ( request( 'relation' ) == 'in' ) {
      return $model->whereHas( 'countries', function ( $q ) {
        $q->where( 'country_id', $this->countryId );
      } );
    }

    return $model->where( 'country_id', '=', $this->countryId );
  }

}
