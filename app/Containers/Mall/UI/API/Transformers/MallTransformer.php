<?php

namespace App\Containers\Mall\UI\API\Transformers;

use App\Containers\Area\UI\API\Transformers\AreaTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Mall\Models\Mall;
use App\Containers\Park\UI\API\Transformers\ParkTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;


class MallTransformer extends Transformer {
  /**
   * @var  array
   */
  protected $defaultIncludes = [
    'parks',

  ];

  /**
   * @var  array
   */
  protected $availableIncludes = [
    'country',
    'user',
    'area',

  ];

  /**
   * @param Mall $entity
   *
   * @return array
   */
  public function transform( Mall $entity ) {
    $response = [
      'object'     => 'Mall',
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

  public function includeCountry( Mall $item ) {
    return $this->item( $item->country, new CountryTransformer() );
  }

  public function includeUser( Mall $item ) {
    return $this->item( $item->user, new UserTransformer() );
  }

  public function includeParks( Mall $item ) {
    return $this->collection( $item->parks, new ParkTransformer() );
  }

  public function includeArea( Mall $item ) {
    return $this->item( $item->area, new AreaTransformer() );
  }


}
