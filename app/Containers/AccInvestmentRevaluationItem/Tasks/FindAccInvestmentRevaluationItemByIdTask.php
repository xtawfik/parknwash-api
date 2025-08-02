<?php

namespace App\Containers\AccInvestmentRevaluationItem\Tasks;

use App\Containers\AccInvestmentRevaluationItem\Data\Repositories\AccInvestmentRevaluationItemRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccInvestmentRevaluationItemByIdTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRevaluationItemRepository $repository)
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
