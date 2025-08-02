<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccPayslip\Data\Repositories\AccPayslipRepository;
use App\Ship\Parents\Tasks\Task;

class AccPayslipReportTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
