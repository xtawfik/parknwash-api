<?php

namespace App\Containers\AccInvestment\Tasks;

use App\Containers\AccInvestment\Data\Repositories\AccInvestmentRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccInvestmentTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        if(request()->has("investment_revaluations")) {
              $repository->investment_revaluations()->sync(request("investment_revaluations"));
            }


        return $repository;
    }
}

