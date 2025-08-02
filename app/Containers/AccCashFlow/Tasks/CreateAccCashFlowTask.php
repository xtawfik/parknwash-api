<?php

namespace App\Containers\AccCashFlow\Tasks;

use App\Containers\AccCashFlow\Data\Repositories\AccCashFlowRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccCashFlowTask extends Task
{

    protected $repository;

    public function __construct(AccCashFlowRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

