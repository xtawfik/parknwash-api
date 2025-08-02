<?php

namespace App\Containers\AccInvestmentRevaluation\Tasks;

use App\Containers\AccInvestmentRevaluation\Data\Repositories\AccInvestmentRevaluationRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccInvestmentRevaluationTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRevaluationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

