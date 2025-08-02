<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Stock\Data\Repositories\StockRepository;
use App\Ship\Parents\Tasks\Task;

class StockReportTask extends Task
{

    protected $repository;

    public function __construct(StockRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
