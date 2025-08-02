<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\MallSupply\Data\Repositories\MallSupplyRepository;
use App\Ship\Parents\Tasks\Task;

class MallSupplyReportTask extends Task
{

    protected $repository;

    public function __construct(MallSupplyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
