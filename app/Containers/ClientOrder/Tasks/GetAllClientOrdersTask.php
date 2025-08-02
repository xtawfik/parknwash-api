<?php

namespace App\Containers\ClientOrder\Tasks;

use App\Containers\ClientOrder\Data\Repositories\ClientOrderRepository;
use App\Ship\Criterias\Eloquent\CurrentCountryCriteria;
use App\Ship\Criterias\Eloquent\ThisUserCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllClientOrdersTask extends Task {

  protected $repository;

  public function __construct( ClientOrderRepository $repository ) {
    $this->repository = $repository;
  }

  public function run() {

    if ( request( 'requestedBy' ) == "dashboard" ) {
      $this->repository->pushCriteria( new CurrentCountryCriteria() );
    }

    if ( request( 'requestedBy' ) == "client" ) {
      $this->repository->pushCriteria( new ThisUserCriteria() );
    }

    return $this->repository->paginate();
  }
}
