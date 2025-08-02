<?php

namespace App\Containers\AccSalesOrder\Tasks;

use App\Containers\AccSalesOrder\Data\Repositories\AccSalesOrderRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccSalesOrderTask extends Task
{

    protected $repository;

    public function __construct(AccSalesOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

