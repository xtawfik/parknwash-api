<?php

namespace App\Containers\Loan\Tasks;

use App\Containers\Loan\Data\Repositories\LoanRepository;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllLoansTask extends Task {

  protected $repository;

  public function __construct( LoanRepository $repository ) {
    $this->repository = $repository;
  }

  public function run() {
    return $this->repository->paginate();
  }
}
