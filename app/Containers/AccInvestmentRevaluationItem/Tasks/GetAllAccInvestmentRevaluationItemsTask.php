<?php

namespace App\Containers\AccInvestmentRevaluationItem\Tasks;

use App\Containers\AccInvestmentRevaluationItem\Data\Repositories\AccInvestmentRevaluationItemRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccInvestmentRevaluationItemsTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRevaluationItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
