<?php

namespace App\Containers\Option\UI\API\Transformers;

use App\Containers\Option\Models\Option;
use App\Containers\OptionCategory\UI\API\Transformers\OptionCategoryTransformer;
use App\Ship\Parents\Transformers\Transformer;


class OptionTransformer extends Transformer {
  /**
   * @var  array
   */
  protected $defaultIncludes = [
    'option_category',

  ];

  /**
   * @var  array
   */
  protected $availableIncludes = [

  ];

  /**
   * @param Option $entity
   *
   * @return array
   */
  public function transform( Option $entity ) {
    $response = [
      'object'     => 'Option',
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

  public function includeOptionCategory( Option $item ) {
    return $this->item( $item->option_category, new OptionCategoryTransformer() );
  }


}
