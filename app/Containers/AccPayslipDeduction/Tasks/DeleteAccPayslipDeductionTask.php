<?php

namespace App\Containers\AccPayslipDeduction\Tasks;

use App\Containers\AccPayslipDeduction\Data\Repositories\AccPayslipDeductionRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccPayslipDeductionTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipDeductionRepository $repository)
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
