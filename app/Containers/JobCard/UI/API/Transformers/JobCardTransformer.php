<?php

namespace App\Containers\JobCard\UI\API\Transformers;

use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\JobCard\Models\JobCard;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Park\UI\API\Transformers\ParkTransformer;
use App\Ship\Parents\Transformers\Transformer;
use App\Containers\Order\Models\Order;

#use#

class JobCardTransformer extends Transformer {
  /**
   * @var  array
   */
  protected $defaultIncludes = [
    'employee',
    'mall',
    'park'

  ];

  /**
   * @var  array
   */
  protected $availableIncludes = [
    #available_includes#
  ];

  /**
   * @param JobCard $entity
   *
   * @return array
   */
  public function transform( JobCard $entity ) {
    $response = [
      'object'     => 'JobCard',
      'id'         => $entity->getHashedKey(),
      'created_at' => $entity->created_at,
      'updated_at' => $entity->updated_at,

    ];

    // Get values of fillables
    $response = $this->fillables( $entity, $response );

    $response = $this->withMedia( $entity, $response, "image" );
    $response = $this->withMedia( $entity, $response, "gallery" );
    $response = $this->withMedia( $entity, $response, "file" );

    $response = $this->ifAdmin( [
      'real_id' => $entity->id,
      // 'deleted_at' => $entity->deleted_at,
    ], $response );

    return $response;
  }

  #includes#
  public function includeEmployee( JobCard $item ) {
    return $this->item( $item->employee, new EmployeeTransformer() );
  }

  // mall
  public function includeMall( JobCard $item ) {
    return $this->item( $item->mall, new MallTransformer() );
  }

  // park
  public function includePark( JobCard $item ) {
    return $this->item( $item->park, new ParkTransformer() );
  }
}
