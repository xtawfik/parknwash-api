<?php

namespace App\Containers\AccRecurringTransaction\Tasks;

use App\Containers\AccRecurringTransaction\Data\Repositories\AccRecurringTransactionRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccRecurringTransactionTask extends Task
{

    protected $repository;

    public function __construct(AccRecurringTransactionRepository $repository)
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
