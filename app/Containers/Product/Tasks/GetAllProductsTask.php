<?php

namespace App\Containers\Product\Tasks;

use App\Containers\Product\Data\Repositories\ProductRepository;
use App\Ship\Criterias\Eloquent\CurrentCountryCriteria;
use App\Ship\Criterias\Eloquent\ThisCountryCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllProductsTask extends Task {

  protected $repository;

  public function __construct( ProductRepository $repository ) {
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
