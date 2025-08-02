<?php

namespace App\Containers\Expense\UI\API\Transformers;

use App\Containers\Expense\Models\Expense;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Ship\Parents\Transformers\Transformer;

#use#

class ExpenseTransformer extends Transformer {
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
    'mall'
  ];

  /**
   * @param Expense $entity
   *
   * @return array
   */
  public function transform( Expense $entity ) {
    $response = [
      'object'     => 'Expense',
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
  public function includeMall( Expense $item ) {
    return $this->item( $item->mall, new MallTransformer() );
  }
}
