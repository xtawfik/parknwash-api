<?php

namespace App\Containers\AccCashFlowType\Tasks;

use App\Containers\AccCashFlowType\Data\Repositories\AccCashFlowTypeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccCashFlowTypeByIdTask extends Task
{

    protected $repository;

    public function __construct(AccCashFlowTypeRepository $repository)
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
