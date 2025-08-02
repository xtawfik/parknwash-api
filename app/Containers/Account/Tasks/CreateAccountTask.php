<?php

namespace App\Containers\Account\Tasks;

use App\Containers\Account\Data\Repositories\AccountRepository;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;

class CreateAccountTask extends Task {

  protected $repository;

  public function __construct( AccountRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {
    // set the account balance from the initial_balance value
    $data['balance'] = $data['initial_balance'];

    $repository = $this->repository->create( $data );

    // add the initial balance transaction
    $repository->transactions()->create( [
      'amount' => $data['initial_balance'],
      'type'   => 'initial_balance',
      'description_en' => 'Initial Balance',
      'description_ar' => 'رصيد افتتاحي',
      'debit'  => 0,
      'credit' => $data['initial_balance'],
      'balance' => $data['initial_balance'],
      'date' => Carbon::now(),
    ] );

    return $repository;
  }
}

