<?php

namespace App\Containers\SalarySheet\Tasks;

use App\Containers\SalarySheet\Data\Repositories\SalarySheetRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllSalarySheetsTask extends Task
{

    protected $repository;

    public function __construct(SalarySheetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        // Sort by year and month asc then by employee code asc
        return $this->repository->orderBy('year', 'asc')->orderBy('month', 'asc')->orderBy('employee_code', 'asc')->paginate();
    }
}
