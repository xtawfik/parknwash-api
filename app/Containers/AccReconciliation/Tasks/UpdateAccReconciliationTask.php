<?php

namespace App\Containers\AccReconciliation\Tasks;

use App\Containers\AccReconciliation\Data\Repositories\AccReconciliationRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccReconciliationTask extends Task
{

    protected $repository;

    public function __construct(AccReconciliationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

