<?php

namespace App\Containers\AccProfitLossAccount\Tasks;

use App\Containers\AccProfitLossAccount\Data\Repositories\AccProfitLossAccountRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccProfitLossAccountTask extends Task
{

    protected $repository;

    public function __construct(AccProfitLossAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

