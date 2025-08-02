<?php

namespace App\Containers\Payroll\Tasks;

use App\Containers\Payroll\Data\Repositories\PayrollRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdatePayrollTask extends Task
{

    protected $repository;

    public function __construct(PayrollRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

