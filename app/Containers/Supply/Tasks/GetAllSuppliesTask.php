<?php

namespace App\Containers\Supply\Tasks;

use App\Containers\Supply\Data\Repositories\SupplyRepository;
use App\Ship\Criterias\Eloquent\CurrentCountryCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllSuppliesTask extends Task {

  protected $repository;

  public function __construct( SupplyRepository $repository ) {
    $this->repository = $repository;
  }

  public function run() {

//    if ( request( 'requestedBy' ) == "dashboard" ) {
//      $this->repository->pushCriteria( new CurrentCountryCriteria(true) );
//    }

    return $this->repository->paginate();
  }
}
