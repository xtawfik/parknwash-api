<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\SalarySheet\Data\Repositories\SalarySheetRepository;
use App\Ship\Parents\Tasks\Task;

class SalarySheetReportTask extends Task
{

    protected $repository;

    public function __construct(SalarySheetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
