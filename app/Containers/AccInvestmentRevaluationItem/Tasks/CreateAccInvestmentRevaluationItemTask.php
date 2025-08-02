<?php

namespace App\Containers\AccInvestmentRevaluationItem\Tasks;

use App\Containers\AccInvestmentRevaluationItem\Data\Repositories\AccInvestmentRevaluationItemRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccInvestmentRevaluationItemTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRevaluationItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

