<?php

namespace App\Containers\AccInvestment\Tasks;

use App\Containers\AccInvestment\Data\Repositories\AccInvestmentRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccInvestmentTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        if(request()->has("investment_revaluations")) {
              $repository->investment_revaluations()->sync(request("investment_revaluations"));
            }


        return $repository;
    }
}

