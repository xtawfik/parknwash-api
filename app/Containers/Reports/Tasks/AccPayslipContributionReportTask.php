<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccPayslipContribution\Data\Repositories\AccPayslipContributionRepository;
use App\Ship\Parents\Tasks\Task;

class AccPayslipContributionReportTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipContributionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
