<?php

namespace App\Containers\Supply\Tasks;

use App\Containers\Supply\Data\Repositories\SupplyRepository;
use App\Containers\Supply\Models\Supply;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateSupplyTask extends Task {

  protected $repository;

  public function __construct( SupplyRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( $id, array $data ) {
    $repository = $this->repository->update( $data, $id );

    if ( request()->has( "countries" ) ) {
      $repository->countries()->sync( request( "countries" ) );
    }

    // check if supply has no barcode generate one
    if ( ! $repository->barcode ) {
      $repository->barcode = rand( 1000000, 9999999 );
      $repository->save();
    }

    // loop all supplies and check if they have no barcode generate one
//    $supplies = Supply::all();
//    foreach ( $supplies as $supply ) {
//      $supply->barcode = rand( 1000000, 9999999 );
//      $supply->save();
//    }

    return $repository;
  }
}

