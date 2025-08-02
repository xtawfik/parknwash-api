<?php

namespace App\Containers\EmployeeExpense\Tasks;

use App\Containers\EmployeeExpense\Data\Repositories\EmployeeExpenseRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindEmployeeExpenseByIdTask extends Task
{

    protected $repository;

    public function __construct(EmployeeExpenseRepository $repository)
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
