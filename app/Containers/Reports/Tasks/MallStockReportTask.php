<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\MallStock\Data\Repositories\MallStockRepository;
use App\Ship\Parents\Tasks\Task;

class MallStockReportTask extends Task
{

    protected $repository;

    public function __construct(MallStockRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
