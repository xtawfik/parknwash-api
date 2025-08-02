<?php

namespace App\Containers\GeneralOption\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class GeneralOptionRepository
 */
class GeneralOptionRepository extends Repository
{

  /**
   * @var array
   */
  protected $fieldSearchable = [
    'id' => '=',
    'name' => 'like',
    'name_en' => 'like',
    'name_ar' => 'like',
    'description' => 'like',
    'path' => '=',

  ];

}
