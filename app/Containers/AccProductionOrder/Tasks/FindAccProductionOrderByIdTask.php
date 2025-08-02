<?php

namespace App\Containers\AccProductionOrder\Tasks;

use App\Containers\AccProductionOrder\Data\Repositories\AccProductionOrderRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccProductionOrderByIdTask extends Task
{

    protected $repository;

    public function __construct(AccProductionOrderRepository $repository)
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
