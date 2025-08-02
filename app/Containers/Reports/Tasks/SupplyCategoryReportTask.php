<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\SupplyCategory\Data\Repositories\SupplyCategoryRepository;
use App\Ship\Parents\Tasks\Task;

class SupplyCategoryReportTask extends Task
{

    protected $repository;

    public function __construct(SupplyCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
