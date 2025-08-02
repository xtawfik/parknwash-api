<?php

namespace App\Containers\AccCashFlowType\Tasks;

use App\Containers\AccCashFlowType\Data\Repositories\AccCashFlowTypeRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccCashFlowTypeTask extends Task
{

    protected $repository;

    public function __construct(AccCashFlowTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
