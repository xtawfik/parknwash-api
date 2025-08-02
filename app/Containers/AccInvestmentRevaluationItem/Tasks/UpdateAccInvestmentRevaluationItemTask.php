<?php

namespace App\Containers\AccInvestmentRevaluationItem\Tasks;

use App\Containers\AccInvestmentRevaluationItem\Data\Repositories\AccInvestmentRevaluationItemRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccInvestmentRevaluationItemTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRevaluationItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

