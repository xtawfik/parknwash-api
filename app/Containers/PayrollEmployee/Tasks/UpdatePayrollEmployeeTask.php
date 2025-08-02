<?php

namespace App\Containers\PayrollEmployee\Tasks;

use App\Containers\PayrollEmployee\Data\Repositories\PayrollEmployeeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdatePayrollEmployeeTask extends Task
{

    protected $repository;

    public function __construct(PayrollEmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

