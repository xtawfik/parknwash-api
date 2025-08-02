<?php

namespace App\Containers\AccPurchaseOrder\Tasks;

use App\Containers\AccPurchaseOrder\Data\Repositories\AccPurchaseOrderRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccPurchaseOrderByIdTask extends Task
{

    protected $repository;

    public function __construct(AccPurchaseOrderRepository $repository)
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
