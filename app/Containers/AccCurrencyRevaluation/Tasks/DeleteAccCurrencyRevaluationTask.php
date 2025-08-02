<?php

namespace App\Containers\AccCurrencyRevaluation\Tasks;

use App\Containers\AccCurrencyRevaluation\Data\Repositories\AccCurrencyRevaluationRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccCurrencyRevaluationTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRevaluationRepository $repository)
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
