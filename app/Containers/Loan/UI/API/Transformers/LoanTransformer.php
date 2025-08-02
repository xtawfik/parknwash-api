<?php

namespace App\Containers\Loan\UI\API\Transformers;

use App\Containers\Loan\Models\Loan;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\LoanType\UI\API\Transformers\LoanTypeTransformer;
use App\Containers\Account\UI\API\Transformers\AccountTransformer;


class LoanTransformer extends Transformer {
  /**
   * @var  array
   */
  protected $defaultIncludes = [

  ];

  /**
   * @var  array
   */
  protected $availableIncludes = [
    'mall',
    'employee',
    'type',
    'account',

  ];

  /**
   * @param Loan $entity
   *
   * @return array
   */
  public function transform( Loan $entity ) {
    $response = [
      'object'     => 'Loan',
      'id'         => $entity->getHashedKey(),
      'created_at' => $entity->created_at,
      'updated_at' => $entity->updated_at,
      'remain'     => $entity->remain,

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

  public function includeMall( Loan $item ) {
    return $this->item( $item->mall, new MallTransformer() );
  }

  public function includeEmployee( Loan $item ) {
    return $this->item( $item->employee, new EmployeeTransformer() );
  }

  public function includeType( Loan $item ) {
    return $this->item( $item->type, new LoanTypeTransformer() );
  }

  public function includeAccount( Loan $item ) {
    return $this->item( $item->account, new AccountTransformer() );
  }


}
