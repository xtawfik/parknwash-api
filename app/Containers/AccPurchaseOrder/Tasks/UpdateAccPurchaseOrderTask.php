<?php

namespace App\Containers\AccPurchaseOrder\Tasks;

use App\Containers\AccPurchaseOrder\Data\Repositories\AccPurchaseOrderRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccPurchaseOrderTask extends Task
{

    protected $repository;

    public function __construct(AccPurchaseOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

