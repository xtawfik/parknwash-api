<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Damaged\Data\Repositories\DamagedRepository;
use App\Ship\Parents\Tasks\Task;

class DamagedReportTask extends Task
{

    protected $repository;

    public function __construct(DamagedRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
