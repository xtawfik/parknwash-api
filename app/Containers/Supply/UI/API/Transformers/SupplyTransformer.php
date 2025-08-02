<?php

namespace App\Containers\Supply\UI\API\Transformers;

use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Nationality\UI\API\Transformers\NationalityTransformer;
use App\Containers\Supply\Models\Supply;
use App\Containers\SupplyCategory\UI\API\Transformers\SupplyCategoryTransformer;
use App\Ship\Parents\Transformers\Transformer;


class SupplyTransformer extends Transformer {
  /**
   * @var  array
   */
  protected $defaultIncludes = [

  ];

  /**
   * @var  array
   */
  protected $availableIncludes = [
    'countries',
    'category',
  ];

  /**
   * @param Supply $entity
   *
   * @return array
   */
  public function transform( Supply $entity ) {
    $response = [
      'object'     => 'Supply',
      'id'         => $entity->getHashedKey(),
      'created_at' => $entity->created_at,
      'updated_at' => $entity->updated_at,
      'stock'      => $entity->stock,
      'stocks'     => $entity->stocks,
      'all_quantity' => $entity->all_quantity,

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

  public function includeCountries( Supply $item ) {
    return $this->collection( $item->countries, new CountryTransformer() );
  }

  // made in
  public function includeMadeIn( Supply $item ) {
    return $this->item( $item->made_in, new NationalityTransformer() );
  }

  public function includeCategory( Supply $item ) {
    return $this->item( $item->category, new SupplyCategoryTransformer() );
  }

}
