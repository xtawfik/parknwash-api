<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\User\Data\Criterias\AdminsCriteria;
use App\Containers\User\Data\Repositories\UserRepository;
use App\Ship\Parents\Tasks\Task;

class AdminsReportTask extends Task
{

  protected $repository;

  public function __construct(UserRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run()
  {
    $this->repository->pushCriteria(new AdminsCriteria());
    return $this->repository;
  }
}
