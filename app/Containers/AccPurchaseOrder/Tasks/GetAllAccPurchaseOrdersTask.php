<?php

namespace App\Containers\AccPurchaseOrder\Tasks;

use App\Containers\AccPurchaseOrder\Data\Repositories\AccPurchaseOrderRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccPurchaseOrdersTask extends Task
{

    protected $repository;

    public function __construct(AccPurchaseOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
