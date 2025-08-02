<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Expense\Data\Repositories\ExpenseRepository;
use App\Ship\Parents\Tasks\Task;

class ExpensesReportTask extends Task
{

    protected $repository;

    public function __construct(ExpenseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
