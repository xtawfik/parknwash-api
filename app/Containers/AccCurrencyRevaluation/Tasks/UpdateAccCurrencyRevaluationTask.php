<?php

namespace App\Containers\AccCurrencyRevaluation\Tasks;

use App\Containers\AccCurrencyRevaluation\Data\Repositories\AccCurrencyRevaluationRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccCurrencyRevaluationTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRevaluationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

