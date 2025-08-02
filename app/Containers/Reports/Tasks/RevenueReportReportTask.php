<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\RevenueReport\Data\Repositories\RevenueReportRepository;
use App\Ship\Parents\Tasks\Task;

class RevenueReportReportTask extends Task
{

    protected $repository;

    public function __construct(RevenueReportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
