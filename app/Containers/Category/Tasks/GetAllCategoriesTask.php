<?php

namespace App\Containers\Category\Tasks;

use App\Containers\Category\Data\Repositories\CategoryRepository;
use App\Ship\Criterias\Eloquent\CurrentCountryCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllCategoriesTask extends Task {

  protected $repository;

  public function __construct( CategoryRepository $repository ) {
    $this->repository = $repository;
  }

  public function run() {

    if ( request( 'requestedBy' ) == "dashboard" ) {
      $this->repository->pushCriteria( new CurrentCountryCriteria( true ) );
    }

    return $this->repository->paginate();
  }
}
