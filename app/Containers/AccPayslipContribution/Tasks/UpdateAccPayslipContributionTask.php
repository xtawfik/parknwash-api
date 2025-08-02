<?php

namespace App\Containers\AccPayslipContribution\Tasks;

use App\Containers\AccPayslipContribution\Data\Repositories\AccPayslipContributionRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccPayslipContributionTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipContributionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

