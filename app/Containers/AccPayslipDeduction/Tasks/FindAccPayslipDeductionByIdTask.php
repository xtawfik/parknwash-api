<?php

namespace App\Containers\AccPayslipDeduction\Tasks;

use App\Containers\AccPayslipDeduction\Data\Repositories\AccPayslipDeductionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccPayslipDeductionByIdTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipDeductionRepository $repository)
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
