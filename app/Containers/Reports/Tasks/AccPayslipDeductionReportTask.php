<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccPayslipDeduction\Data\Repositories\AccPayslipDeductionRepository;
use App\Ship\Parents\Tasks\Task;

class AccPayslipDeductionReportTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipDeductionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
