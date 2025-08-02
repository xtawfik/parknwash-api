<?php

namespace App\Containers\AccCurrencyRevaluation\Tasks;

use App\Containers\AccCurrencyRevaluation\Data\Repositories\AccCurrencyRevaluationRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccCurrencyRevaluationTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRevaluationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

