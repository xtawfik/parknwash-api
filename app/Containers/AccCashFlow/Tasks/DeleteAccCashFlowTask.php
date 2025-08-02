<?php

namespace App\Containers\AccCashFlow\Tasks;

use App\Containers\AccCashFlow\Data\Repositories\AccCashFlowRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccCashFlowTask extends Task
{

    protected $repository;

    public function __construct(AccCashFlowRepository $repository)
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
