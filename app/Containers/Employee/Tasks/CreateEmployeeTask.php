<?php

namespace App\Containers\Employee\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Employee\Data\Repositories\EmployeeRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateEmployeeTask extends Task {

  protected $repository;

  public function __construct( EmployeeRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {
    return $this->repository->create( $data );
  }
}

