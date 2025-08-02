<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccEmployee\Data\Repositories\AccEmployeeRepository;
use App\Ship\Parents\Tasks\Task;

class AccEmployeeReportTask extends Task
{

    protected $repository;

    public function __construct(AccEmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
