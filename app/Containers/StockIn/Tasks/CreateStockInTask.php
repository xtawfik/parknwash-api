<?php

namespace App\Containers\StockIn\Tasks;

use App\Containers\StockIn\Data\Repositories\StockInRepository;
use App\Containers\Supply\Models\Supply;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Auth;

class CreateStockInTask extends Task {

  protected $repository;

  public function __construct( StockInRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {
    $data['user_id'] = Auth::user()->id;
    $repository = $this->repository->create( $data );

    // Modify stock
    Supply::find($data['supply_id'])->increment('quantity', $data['quantity']);

    return $repository;
  }
}

