<?php

namespace App\Containers\AccPayslipContribution\Tasks;

use App\Containers\AccPayslipContribution\Data\Repositories\AccPayslipContributionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccPayslipContributionTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipContributionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

