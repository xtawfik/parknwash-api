<?php

namespace App\Containers\Supply\Tasks;

use App\Containers\Supply\Data\Repositories\SupplyRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateSupplyTask extends Task {

  protected $repository;

  public function __construct( SupplyRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {
    // Create barcode number from random number
    $data[ "barcode" ] = rand( 1000000, 9999999 );

    $repository = $this->repository->create( $data );

    if ( request()->has( "countries" ) ) {
      $repository->countries()->sync( request( "countries" ) );
    }


    return $repository;
  }
}

