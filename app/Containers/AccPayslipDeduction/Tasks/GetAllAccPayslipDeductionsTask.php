<?php

namespace App\Containers\AccPayslipDeduction\Tasks;

use App\Containers\AccPayslipDeduction\Data\Repositories\AccPayslipDeductionRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccPayslipDeductionsTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipDeductionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
