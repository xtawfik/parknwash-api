<?php

namespace App\Containers\AccRecurringTransaction\Tasks;

use App\Containers\AccRecurringTransaction\Data\Repositories\AccRecurringTransactionRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccRecurringTransactionsTask extends Task
{

    protected $repository;

    public function __construct(AccRecurringTransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
