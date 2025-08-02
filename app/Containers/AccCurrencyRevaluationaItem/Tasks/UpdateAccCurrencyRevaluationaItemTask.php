<?php

namespace App\Containers\AccCurrencyRevaluationaItem\Tasks;

use App\Containers\AccCurrencyRevaluationaItem\Data\Repositories\AccCurrencyRevaluationaItemRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccCurrencyRevaluationaItemTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRevaluationaItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

