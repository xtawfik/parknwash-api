<?php

namespace App\Containers\AccCurrencyRevaluationaItem\Tasks;

use App\Containers\AccCurrencyRevaluationaItem\Data\Repositories\AccCurrencyRevaluationaItemRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccCurrencyRevaluationaItemsTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRevaluationaItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
