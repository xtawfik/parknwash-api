<?php

namespace App\Containers\AccPayslip\Tasks;

use App\Containers\AccPayslip\Data\Repositories\AccPayslipRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccPayslipsTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
