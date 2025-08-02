<?php

namespace App\Containers\AccProfitLoss\Tasks;

use App\Containers\AccProfitLoss\Data\Repositories\AccProfitLossRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccProfitLossTask extends Task
{

    protected $repository;

    public function __construct(AccProfitLossRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

