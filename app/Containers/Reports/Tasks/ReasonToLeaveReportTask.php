<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\ReasonToLeave\Data\Repositories\ReasonToLeaveRepository;
use App\Ship\Parents\Tasks\Task;

class ReasonToLeaveReportTask extends Task
{

    protected $repository;

    public function __construct(ReasonToLeaveRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
