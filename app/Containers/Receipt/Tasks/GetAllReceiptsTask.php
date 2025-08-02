<?php

namespace App\Containers\Receipt\Tasks;

use App\Containers\Receipt\Data\Repositories\ReceiptRepository;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllReceiptsTask extends Task {

  protected $repository;

  public function __construct( ReceiptRepository $repository ) {
    $this->repository = $repository;
  }

  public function run() {
    if ( request()->has( 'allocate_id' ) ) {
      $this->repository->pushCriteria( new ThisEqualThatCriteria( 'allocate_id', request()->get( 'allocate_id' ) ) );
    }

    return $this->repository->paginate();
  }
}
