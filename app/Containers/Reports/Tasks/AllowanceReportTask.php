<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Allowance\Data\Repositories\AllowanceRepository;
use App\Ship\Parents\Tasks\Task;

class AllowanceReportTask extends Task
{

    protected $repository;

    public function __construct(AllowanceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
