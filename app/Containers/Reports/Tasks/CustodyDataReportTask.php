<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\CustodyData\Data\Repositories\CustodyDataRepository;
use App\Ship\Parents\Tasks\Task;

class CustodyDataReportTask extends Task
{

    protected $repository;

    public function __construct(CustodyDataRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
