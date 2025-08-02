<?php

namespace App\Containers\Area\Tasks;

use App\Containers\Area\Data\Repositories\AreaRepository;
use App\Containers\Mall\Models\Mall;
use App\Ship\Parents\Tasks\Task;

class CreateAreaTask extends Task {

  protected $repository;

  public function __construct( AreaRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {
    $repository = $this->repository->create( $data );

    if ( request()->has( "malls" ) ) {
      Mall::whereIn( 'id', request( 'malls' ) )->update( [
        'area_id' => $repository->id
      ] );
    }

    return $repository;
  }
}

