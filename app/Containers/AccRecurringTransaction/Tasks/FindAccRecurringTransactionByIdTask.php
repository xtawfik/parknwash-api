<?php

namespace App\Containers\AccRecurringTransaction\Tasks;

use App\Containers\AccRecurringTransaction\Data\Repositories\AccRecurringTransactionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccRecurringTransactionByIdTask extends Task
{

    protected $repository;

    public function __construct(AccRecurringTransactionRepository $repository)
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
