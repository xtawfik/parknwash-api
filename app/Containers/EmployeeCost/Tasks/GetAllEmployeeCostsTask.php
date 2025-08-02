<?php

namespace App\Containers\EmployeeCost\Tasks;

use App\Containers\EmployeeCost\Data\Repositories\EmployeeCostRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllEmployeeCostsTask extends Task
{

    protected $repository;

    public function __construct(EmployeeCostRepository $repository)
    {
        $this->repository = $repository;
    }

  public function run()
  {
    // Sort by year and month asc then by employee code asc
    return $this->repository->orderBy('year', 'asc')->orderBy('month', 'asc')->orderBy('employee_code', 'asc')->paginate();
  }
}
