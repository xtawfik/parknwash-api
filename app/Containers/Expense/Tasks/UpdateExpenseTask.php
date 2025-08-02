<?php

namespace App\Containers\Expense\Tasks;

use App\Containers\Expense\Data\Repositories\ExpenseRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateExpenseTask extends Task
{

    protected $repository;

    public function __construct(ExpenseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        #ManyToMany#

        return $repository;
    }
}

