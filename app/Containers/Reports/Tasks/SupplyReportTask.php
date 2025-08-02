<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Supply\Data\Repositories\SupplyRepository;
use App\Ship\Parents\Tasks\Task;

class SupplyReportTask extends Task
{

    protected $repository;

    public function __construct(SupplyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
