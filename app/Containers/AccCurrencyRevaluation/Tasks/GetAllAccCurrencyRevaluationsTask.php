<?php

namespace App\Containers\AccCurrencyRevaluation\Tasks;

use App\Containers\AccCurrencyRevaluation\Data\Repositories\AccCurrencyRevaluationRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccCurrencyRevaluationsTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRevaluationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
