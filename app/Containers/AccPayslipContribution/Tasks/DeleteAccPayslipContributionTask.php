<?php

namespace App\Containers\AccPayslipContribution\Tasks;

use App\Containers\AccPayslipContribution\Data\Repositories\AccPayslipContributionRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccPayslipContributionTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipContributionRepository $repository)
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
