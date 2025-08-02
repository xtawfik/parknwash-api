<?php

namespace App\Containers\EmployeeDeduction\Tasks;

use App\Containers\EmployeeDeduction\Data\Repositories\EmployeeDeductionRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteEmployeeDeductionTask extends Task
{

    protected $repository;

    public function __construct(EmployeeDeductionRepository $repository)
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
