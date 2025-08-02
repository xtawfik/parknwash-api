<?php

namespace App\Containers\Service\Tasks;

use App\Containers\Service\Data\Repositories\ServiceRepository;
use App\Ship\Criterias\Eloquent\CurrentCountryCriteria;
use App\Ship\Criterias\Eloquent\ThisCountryCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllServicesTask extends Task {

  protected $repository;

  public function __construct( ServiceRepository $repository ) {
    $this->repository = $repository;
  }

  public function run() {
    if ( request()->has( 'country' ) ) {
      $this->repository->pushCriteria( new ThisCountryCriteria( request( 'country' ) ) );
    }

    if ( request( 'requestedBy' ) == "dashboard" ) {
      $this->repository->pushCriteria( new CurrentCountryCriteria() );
    }

    return $this->repository->paginate();
  }
}
