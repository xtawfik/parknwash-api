<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\CustodyCategory\Data\Repositories\CustodyCategoryRepository;
use App\Ship\Parents\Tasks\Task;

class CustodyCategoryReportTask extends Task
{

    protected $repository;

    public function __construct(CustodyCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
