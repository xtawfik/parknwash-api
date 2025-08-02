<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccInventoryTransfer\Data\Repositories\AccInventoryTransferRepository;
use App\Ship\Parents\Tasks\Task;

class AccInventoryTransferReportTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryTransferRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
