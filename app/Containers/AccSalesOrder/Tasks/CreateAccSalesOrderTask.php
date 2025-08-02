<?php

namespace App\Containers\AccSalesOrder\Tasks;

use App\Containers\AccSalesOrder\Data\Repositories\AccSalesOrderRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccSalesOrderTask extends Task
{

    protected $repository;

    public function __construct(AccSalesOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

