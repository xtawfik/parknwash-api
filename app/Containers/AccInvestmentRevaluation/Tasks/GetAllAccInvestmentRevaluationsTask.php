<?php

namespace App\Containers\AccInvestmentRevaluation\Tasks;

use App\Containers\AccInvestmentRevaluation\Data\Repositories\AccInvestmentRevaluationRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccInvestmentRevaluationsTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRevaluationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
