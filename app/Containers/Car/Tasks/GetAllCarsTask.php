<?php

namespace App\Containers\Car\Tasks;

use App\Containers\Car\Data\Repositories\CarRepository;
use App\Ship\Criterias\Eloquent\CurrentCountryCriteria;
use App\Ship\Criterias\Eloquent\ThisCountryCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllCarsTask extends Task {

  protected $repository;

  public function __construct( CarRepository $repository ) {
    $this->repository = $repository;
  }

  public function run() {

    if ( request()->has( 'country' ) ) {
      $this->repository->pushCriteria( new ThisCountryCriteria( request( 'country' ) ) );
    }

    if ( request( 'requestedBy' ) == "dashboard" ) {
      $this->repository->pushCriteria( new CurrentCountryCriteria(true) );
    }

    return $this->repository->paginate();
  }
}
