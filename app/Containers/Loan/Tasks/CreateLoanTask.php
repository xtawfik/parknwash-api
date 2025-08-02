<?php

namespace App\Containers\Loan\Tasks;

use App\Containers\Loan\Data\Repositories\LoanRepository;
use App\Containers\Receipt\Tasks\CreateReceiptTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateLoanTask extends Task {

  protected $repository;

  public function __construct( LoanRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {
    $repository = $this->repository->create( $data );

    // Create a receipt for the loan
    app(CreateReceiptTask::class)->run([
      'account_id' => $data['account_id'],
      'amount' => $data['amount'],
      'type' => 'payment',
      'date' => $data['date'],
      'allocate' => 'loan',
      'allocate_id' => $repository->id,
      'employee_id' => $data['employee_id'],
    ]);

    return $repository;
  }
}

