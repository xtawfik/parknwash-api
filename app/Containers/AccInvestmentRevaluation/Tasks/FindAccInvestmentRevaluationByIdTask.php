<?php

namespace App\Containers\AccInvestmentRevaluation\Tasks;

use App\Containers\AccInvestmentRevaluation\Data\Repositories\AccInvestmentRevaluationRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccInvestmentRevaluationByIdTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRevaluationRepository $repository)
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
