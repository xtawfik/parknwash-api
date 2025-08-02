<?php

namespace App\Containers\Request\Tasks;

use App\Containers\Request\Data\Repositories\RequestRepository;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;

class UpdateRequestTask extends Task {

  protected $repository;

  public function __construct( RequestRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( $id, array $data ) {

    if(request('status') == "completed") {
      $data['received_at'] = Carbon::now();
    }

    $repository = $this->repository->update( $data, $id );
    return $repository;
  }
}

