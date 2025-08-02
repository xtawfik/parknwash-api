<?php

namespace App\Containers\AccProfitLoss\Tasks;

use App\Containers\AccProfitLoss\Data\Repositories\AccProfitLossRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccProfitLossTask extends Task
{

    protected $repository;

    public function __construct(AccProfitLossRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

