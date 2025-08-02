<?php

namespace App\Containers\EmployeeExpense\Tasks;

use App\Containers\EmployeeExpense\Data\Repositories\EmployeeExpenseRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteEmployeeExpenseTask extends Task
{

    protected $repository;

    public function __construct(EmployeeExpenseRepository $repository)
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
