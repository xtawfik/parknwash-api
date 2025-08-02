<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\EmployeeExpense\Data\Repositories\EmployeeExpenseRepository;
use App\Ship\Parents\Tasks\Task;

class EmployeeExpenseReportTask extends Task
{

    protected $repository;

    public function __construct(EmployeeExpenseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
