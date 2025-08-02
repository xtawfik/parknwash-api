<?php

namespace App\Containers\AccCurrencyRevaluation\Tasks;

use App\Containers\AccCurrencyRevaluation\Data\Repositories\AccCurrencyRevaluationRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccCurrencyRevaluationByIdTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRevaluationRepository $repository)
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
