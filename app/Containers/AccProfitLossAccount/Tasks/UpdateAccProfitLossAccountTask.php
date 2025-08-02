<?php

namespace App\Containers\AccProfitLossAccount\Tasks;

use App\Containers\AccProfitLossAccount\Data\Repositories\AccProfitLossAccountRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccProfitLossAccountTask extends Task
{

    protected $repository;

    public function __construct(AccProfitLossAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

