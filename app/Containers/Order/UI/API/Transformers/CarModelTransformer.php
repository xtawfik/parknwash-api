<?php

namespace App\Containers\Order\UI\API\Transformers;

use App\Containers\CarModel\Models\CarModel;
use App\Ship\Parents\Transformers\Transformer;

#use#

class CarModelTransformer extends Transformer {
  /**
   * @var  array
   */
  protected $defaultIncludes = [

  ];

  /**
   * @var  array
   */
  protected $availableIncludes = [
    #available_includes#
  ];

  /**
   * @param CarModel $entity
   *
   * @return array
   */
  public function transform( CarModel $entity ) {
    $response = [
      'object' => 'CarModel',
      'id'     => $entity->getHashedKey(),

    ];

    // Get values of fillables
    $response = $this->fillables( $entity, $response );

    // add logo
    $response['logo'] = 'https://parknwash.com/brands/' . $entity->logo;

    $response = $this->ifAdmin( [
      'real_id' => $entity->id,
      // 'deleted_at' => $entity->deleted_at,
    ], $response );

    return $response;
  }

  #includes#
}
