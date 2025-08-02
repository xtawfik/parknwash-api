<?php

namespace App\Containers\AccPurchaseOrder\Tasks;

use App\Containers\AccPurchaseOrder\Data\Repositories\AccPurchaseOrderRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccPurchaseOrderTask extends Task
{

    protected $repository;

    public function __construct(AccPurchaseOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
