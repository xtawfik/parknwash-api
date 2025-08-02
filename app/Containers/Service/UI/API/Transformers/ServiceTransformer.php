<?php

namespace App\Containers\Service\UI\API\Transformers;

use App\Containers\Car\UI\API\Transformers\CarTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Service\Models\Service;
use App\Containers\ServiceCover\UI\API\Transformers\ServiceCoverTransformer;
use App\Containers\ServiceType\UI\API\Transformers\ServiceTypeTransformer;
use App\Ship\Parents\Transformers\Transformer;


class ServiceTransformer extends Transformer {
  /**
   * @var  array
   */
  protected $defaultIncludes = [

  ];

  /**
   * @var  array
   */
  protected $availableIncludes = [
    'country',
    'car',
    'service_type',
    'service_covers',

  ];

  /**
   * @param Service $entity
   *
   * @return array
   */
  public function transform( Service $entity ) {
    $response = [
      'object'     => 'Service',
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

  public function includeCountry( Service $item ) {
    return $this->item( $item->country, new CountryTransformer() );
  }

  public function includeCar( Service $item ) {
    return $this->item( $item->car, new CarTransformer() );
  }

  public function includeServiceType( Service $item ) {
    return $this->item( $item->service_type, new ServiceTypeTransformer() );
  }

  public function includeServiceCovers( Service $item ) {
    return $this->collection( $item->service_covers, new ServiceCoverTransformer() );
  }


}
