<?php

namespace App\Containers\CarModel\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CarModelRepository
 */
class CarModelRepository extends Repository
{

  /**
   * @var array
   */
  protected $fieldSearchable = [
    'id' => '=',
    'name' => 'LIKE',

  ];

}
