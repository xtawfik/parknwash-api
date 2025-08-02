<?php

namespace App\Containers\AccInvestmentRevaluation\Tasks;

use App\Containers\AccInvestmentRevaluation\Data\Repositories\AccInvestmentRevaluationRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccInvestmentRevaluationTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRevaluationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

