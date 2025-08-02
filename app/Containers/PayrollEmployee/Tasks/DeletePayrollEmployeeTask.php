<?php

namespace App\Containers\PayrollEmployee\Tasks;

use App\Containers\PayrollEmployee\Data\Repositories\PayrollEmployeeRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeletePayrollEmployeeTask extends Task
{

    protected $repository;

    public function __construct(PayrollEmployeeRepository $repository)
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
