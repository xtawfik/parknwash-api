<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccInvestment\Data\Repositories\AccInvestmentRepository;
use App\Ship\Parents\Tasks\Task;

class AccInvestmentReportTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
