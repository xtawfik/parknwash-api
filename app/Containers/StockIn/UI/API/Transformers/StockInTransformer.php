<?php

namespace App\Containers\StockIn\UI\API\Transformers;

use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\StockIn\Models\StockIn;
use App\Containers\Supply\UI\API\Transformers\SupplyTransformer;
use App\Containers\User\Models\User;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;


class StockInTransformer extends Transformer {
  /**
   * @var  array
   */
  protected $defaultIncludes = [

  ];

  /**
   * @var  array
   */
  protected $availableIncludes = [
    'supply',
    'user',
    'country',

  ];

  /**
   * @param StockIn $entity
   *
   * @return array
   */
  public function transform( StockIn $entity ) {
    $response = [
      'object'     => 'StockIn',
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

  public function includeSupply( StockIn $item ) {
    return $this->item( $item->supply, new SupplyTransformer() );
  }

  public function includeUser( StockIn $item ) {
    return $this->item( $item->user, new UserTransformer() );
  }

  public function includeCountry(StockIn $user) {
    return $this->item($user->country, new CountryTransformer());
  }

}
