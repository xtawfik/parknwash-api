<?php

namespace App\Containers\EmployeeDeductionType\Tasks;

use App\Containers\EmployeeDeductionType\Data\Repositories\EmployeeDeductionTypeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindEmployeeDeductionTypeByIdTask extends Task
{

    protected $repository;

    public function __construct(EmployeeDeductionTypeRepository $repository)
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
