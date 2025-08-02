<?php

namespace App\Containers\AccClearedBalance\Tasks;

use App\Containers\AccClearedBalance\Data\Repositories\AccClearedBalanceRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccClearedBalanceTask extends Task
{

    protected $repository;

    public function __construct(AccClearedBalanceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

