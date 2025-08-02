<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccPurchaseOrder\Data\Repositories\AccPurchaseOrderRepository;
use App\Ship\Parents\Tasks\Task;

class AccPurchaseOrderReportTask extends Task
{

    protected $repository;

    public function __construct(AccPurchaseOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
