<?php

namespace App\Containers\AccProductionCost\Tasks;

use App\Containers\AccProductionCost\Data\Repositories\AccProductionCostRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccProductionCostTask extends Task
{

    protected $repository;

    public function __construct(AccProductionCostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

