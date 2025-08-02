<?php

namespace App\Containers\AccProductionOrder\Tasks;

use App\Containers\AccProductionOrder\Data\Repositories\AccProductionOrderRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccProductionOrderTask extends Task
{

    protected $repository;

    public function __construct(AccProductionOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

