<?php

namespace App\Containers\AccSalesOrder\Tasks;

use App\Containers\AccSalesOrder\Data\Repositories\AccSalesOrderRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccSalesOrdersTask extends Task
{

    protected $repository;

    public function __construct(AccSalesOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
