<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\CoverPrice\Data\Repositories\CoverPriceRepository;
use App\Ship\Parents\Tasks\Task;

class CoverPriceReportTask extends Task
{

    protected $repository;

    public function __construct(CoverPriceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
