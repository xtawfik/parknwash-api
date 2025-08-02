<?php

namespace App\Containers\Payroll\Tasks;

use App\Containers\Payroll\Data\Repositories\PayrollRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindPayrollByIdTask extends Task
{

    protected $repository;

    public function __construct(PayrollRepository $repository)
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
