<?php

namespace App\Containers\AccPayslipContribution\Tasks;

use App\Containers\AccPayslipContribution\Data\Repositories\AccPayslipContributionRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccPayslipContributionsTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipContributionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
