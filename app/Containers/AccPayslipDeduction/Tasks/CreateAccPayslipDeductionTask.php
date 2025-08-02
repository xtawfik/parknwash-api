<?php

namespace App\Containers\AccPayslipDeduction\Tasks;

use App\Containers\AccPayslipDeduction\Data\Repositories\AccPayslipDeductionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccPayslipDeductionTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipDeductionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

