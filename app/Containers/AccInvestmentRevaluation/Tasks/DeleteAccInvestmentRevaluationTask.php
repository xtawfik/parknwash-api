<?php

namespace App\Containers\AccInvestmentRevaluation\Tasks;

use App\Containers\AccInvestmentRevaluation\Data\Repositories\AccInvestmentRevaluationRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccInvestmentRevaluationTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRevaluationRepository $repository)
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
