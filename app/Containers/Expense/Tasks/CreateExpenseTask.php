<?php

namespace App\Containers\Expense\Tasks;

use App\Containers\Expense\Data\Repositories\ExpenseRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateExpenseTask extends Task
{

    protected $repository;

    public function __construct(ExpenseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

