<?php

namespace App\Containers\AccCurrencyRevaluationaItem\Tasks;

use App\Containers\AccCurrencyRevaluationaItem\Data\Repositories\AccCurrencyRevaluationaItemRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccCurrencyRevaluationaItemTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRevaluationaItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

