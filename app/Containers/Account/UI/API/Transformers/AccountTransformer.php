<?php

namespace App\Containers\Account\UI\API\Transformers;

use App\Containers\Account\Models\Account;
use App\Containers\AccountType\UI\API\Transformers\AccountTypeTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Ship\Parents\Transformers\Transformer;


class AccountTransformer extends Transformer {
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
    'mall',
    'type',

  ];

  /**
   * @param Account $entity
   *
   * @return array
   */
  public function transform( Account $entity ) {
    $response = [
      'object'     => 'Account',
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

  public function includeCountry( Account $item ) {
    return $this->item( $item->country, new CountryTransformer() );
  }

  public function includeMall( Account $item ) {
    return $this->item( $item->mall, new MallTransformer() );
  }

  public function includeType( Account $item ) {
    return $this->item( $item->type, new AccountTypeTransformer() );
  }


}
