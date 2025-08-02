<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Custody\Data\Repositories\CustodyRepository;
use App\Ship\Parents\Tasks\Task;

class CustodyReportTask extends Task
{

    protected $repository;

    public function __construct(CustodyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
