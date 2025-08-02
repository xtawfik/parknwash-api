<?php

namespace App\Containers\AccCashFlowType\Tasks;

use App\Containers\AccCashFlowType\Data\Repositories\AccCashFlowTypeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccCashFlowTypesTask extends Task
{

    protected $repository;

    public function __construct(AccCashFlowTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
