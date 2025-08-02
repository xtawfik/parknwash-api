<?php

namespace App\Containers\AccProductionCost\Tasks;

use App\Containers\AccProductionCost\Data\Repositories\AccProductionCostRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccProductionCostTask extends Task
{

    protected $repository;

    public function __construct(AccProductionCostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

