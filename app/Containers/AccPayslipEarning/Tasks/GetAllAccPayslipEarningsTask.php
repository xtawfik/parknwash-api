<?php

namespace App\Containers\AccPayslipEarning\Tasks;

use App\Containers\AccPayslipEarning\Data\Repositories\AccPayslipEarningRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccPayslipEarningsTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipEarningRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
