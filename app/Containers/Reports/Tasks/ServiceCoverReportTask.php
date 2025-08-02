<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\ServiceCover\Data\Repositories\ServiceCoverRepository;
use App\Ship\Parents\Tasks\Task;

class ServiceCoverReportTask extends Task
{

    protected $repository;

    public function __construct(ServiceCoverRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
