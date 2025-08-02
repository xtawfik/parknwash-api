<?php

namespace App\Containers\AccCurrencyRevaluationaItem\Tasks;

use App\Containers\AccCurrencyRevaluationaItem\Data\Repositories\AccCurrencyRevaluationaItemRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccCurrencyRevaluationaItemByIdTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRevaluationaItemRepository $repository)
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
