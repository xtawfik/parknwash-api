<?php

namespace App\Containers\AccProductionCost\Tasks;

use App\Containers\AccProductionCost\Data\Repositories\AccProductionCostRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccProductionCostsTask extends Task
{

    protected $repository;

    public function __construct(AccProductionCostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
