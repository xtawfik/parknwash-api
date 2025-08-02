<?php

namespace App\Containers\Request\Tasks;

use App\Containers\Request\Data\Repositories\RequestRepository;
use App\Containers\RequestItem\Models\RequestItem;
use App\Ship\Parents\Tasks\Task;

class CreateRequestTask extends Task {

  protected $repository;

  public function __construct( RequestRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {
    $repository = $this->repository->create( $data );

    if ( request()->has( "request_items" ) ) {
      $request_id = $repository->id;
      foreach(request( "request_items" ) as $item) {
        RequestItem::create([
          'request_id' => $request_id,
          'quantity' => $item['quantity'],
          'supply_id'=> $item['supply_id']
        ]);
      }
    }

    return $repository;
  }
}

