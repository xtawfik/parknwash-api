<?php

namespace App\Containers\AccCashFlow\Tasks;

use App\Containers\AccCashFlow\Data\Repositories\AccCashFlowRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccCashFlowsTask extends Task
{

    protected $repository;

    public function __construct(AccCashFlowRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
