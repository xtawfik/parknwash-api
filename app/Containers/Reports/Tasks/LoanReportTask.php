<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Loan\Data\Repositories\LoanRepository;
use App\Ship\Parents\Tasks\Task;

class LoanReportTask extends Task
{

    protected $repository;

    public function __construct(LoanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
