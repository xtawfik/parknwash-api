<?php

namespace App\Containers\AccSalesOrder\Tasks;

use App\Containers\AccSalesOrder\Data\Repositories\AccSalesOrderRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccSalesOrderByIdTask extends Task
{

    protected $repository;

    public function __construct(AccSalesOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
