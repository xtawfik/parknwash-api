<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Request\Data\Repositories\RequestRepository;
use App\Ship\Parents\Tasks\Task;

class RequestReportTask extends Task
{

    protected $repository;

    public function __construct(RequestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
