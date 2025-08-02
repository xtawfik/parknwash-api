<?php

namespace App\Containers\AccReconciliation\Tasks;

use App\Containers\AccReconciliation\Data\Repositories\AccReconciliationRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccReconciliationByIdTask extends Task
{

    protected $repository;

    public function __construct(AccReconciliationRepository $repository)
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
