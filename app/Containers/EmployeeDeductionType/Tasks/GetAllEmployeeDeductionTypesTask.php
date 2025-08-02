<?php

namespace App\Containers\EmployeeDeductionType\Tasks;

use App\Containers\EmployeeDeductionType\Data\Repositories\EmployeeDeductionTypeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllEmployeeDeductionTypesTask extends Task
{

    protected $repository;

    public function __construct(EmployeeDeductionTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
