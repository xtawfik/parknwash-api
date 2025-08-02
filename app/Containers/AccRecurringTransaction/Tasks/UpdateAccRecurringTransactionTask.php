<?php

namespace App\Containers\AccRecurringTransaction\Tasks;

use App\Containers\AccRecurringTransaction\Data\Repositories\AccRecurringTransactionRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccRecurringTransactionTask extends Task
{

    protected $repository;

    public function __construct(AccRecurringTransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

