<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Service\Data\Repositories\ServiceRepository;
use App\Ship\Parents\Tasks\Task;

class ServiceReportTask extends Task
{

    protected $repository;

    public function __construct(ServiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
