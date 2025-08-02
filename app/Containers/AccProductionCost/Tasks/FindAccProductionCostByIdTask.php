<?php

namespace App\Containers\AccProductionCost\Tasks;

use App\Containers\AccProductionCost\Data\Repositories\AccProductionCostRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccProductionCostByIdTask extends Task
{

    protected $repository;

    public function __construct(AccProductionCostRepository $repository)
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
