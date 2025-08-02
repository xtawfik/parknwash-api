<?php

namespace App\Containers\AccInvestmentRevaluationItem\Tasks;

use App\Containers\AccInvestmentRevaluationItem\Data\Repositories\AccInvestmentRevaluationItemRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccInvestmentRevaluationItemTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRevaluationItemRepository $repository)
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
