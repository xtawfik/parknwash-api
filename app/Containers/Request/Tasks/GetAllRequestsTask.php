<?php

namespace App\Containers\Request\Tasks;

use App\Containers\Request\Data\Repositories\RequestRepository;
use App\Ship\Criterias\Eloquent\CurrentCountryCriteria;
use App\Ship\Criterias\Eloquent\ThisUserCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllRequestsTask extends Task {

  protected $repository;

  public function __construct( RequestRepository $repository ) {
    $this->repository = $repository;
  }

  public function run() {
    if ( request( 'requestedBy' ) == "employee" ) {
      $this->repository->pushCriteria( new ThisUserCriteria );
    }

    if ( request( 'requestedBy' ) == "dashboard" ) {
      $this->repository->pushCriteria( new CurrentCountryCriteria() );
    }

    return $this->repository->paginate();
  }
}
