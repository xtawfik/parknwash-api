<?php

namespace App\Containers\EmployeeDeduction\Tasks;

use App\Containers\EmployeeDeduction\Data\Repositories\EmployeeDeductionRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllEmployeeDeductionsTask extends Task
{

    protected $repository;

    public function __construct(EmployeeDeductionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
