<?php

namespace App\Containers\OrderProduct\UI\API\Transformers;

use App\Containers\ClientOrder\UI\API\Transformers\ClientOrderTransformer;
use App\Containers\Option\UI\API\Transformers\OptionTransformer;
use App\Containers\OrderOption\UI\API\Transformers\OrderOptionTransformer;
use App\Containers\OrderProduct\Models\OrderProduct;
use App\Containers\Product\UI\API\Transformers\ProductTransformer;
use App\Ship\Parents\Transformers\Transformer;


class OrderProductTransformer extends Transformer {
  /**
   * @var  array
   */
  protected $defaultIncludes = [

  ];

  /**
   * @var  array
   */
  protected $availableIncludes = [
    'order',
    'product',
    'option',
    'order_options',

  ];

  /**
   * @param OrderProduct $entity
   *
   * @return array
   */
  public function transform( OrderProduct $entity ) {
    $response = [
      'object'     => 'OrderProduct',
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

  public function includeOrder( OrderProduct $item ) {
    return $this->item( $item->order, new ClientOrderTransformer() );
  }

  public function includeProduct( OrderProduct $item ) {
    return $this->item( $item->product, new ProductTransformer() );
  }

  public function includeOption( OrderProduct $item ) {
    return $this->item( $item->option, new OptionTransformer() );
  }

  public function includeOrderOptions( OrderProduct $item ) {
    return $this->collection( $item->order_options, new OrderOptionTransformer() );
  }


}
