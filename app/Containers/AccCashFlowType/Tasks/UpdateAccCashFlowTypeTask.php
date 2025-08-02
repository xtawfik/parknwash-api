<?php

namespace App\Containers\AccCashFlowType\Tasks;

use App\Containers\AccCashFlowType\Data\Repositories\AccCashFlowTypeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccCashFlowTypeTask extends Task
{

    protected $repository;

    public function __construct(AccCashFlowTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

