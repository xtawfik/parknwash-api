<?php

namespace App\Containers\AccCurrencyRevaluationaItem\Tasks;

use App\Containers\AccCurrencyRevaluationaItem\Data\Repositories\AccCurrencyRevaluationaItemRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccCurrencyRevaluationaItemTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRevaluationaItemRepository $repository)
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
