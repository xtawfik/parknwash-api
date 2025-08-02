<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\StockIn\Data\Repositories\StockInRepository;
use App\Ship\Parents\Tasks\Task;

class StockInReportTask extends Task
{

    protected $repository;

    public function __construct(StockInRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
