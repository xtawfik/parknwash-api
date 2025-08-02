<?php

namespace App\Containers\AccProductionOrder\Tasks;

use App\Containers\AccProductionOrder\Data\Repositories\AccProductionOrderRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccProductionOrderTask extends Task
{

    protected $repository;

    public function __construct(AccProductionOrderRepository $repository)
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
