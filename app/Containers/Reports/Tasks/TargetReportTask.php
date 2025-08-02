<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Target\Data\Repositories\TargetRepository;
use App\Ship\Parents\Tasks\Task;

class TargetReportTask extends Task
{

    protected $repository;

    public function __construct(TargetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
