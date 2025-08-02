<?php

namespace App\Containers\AccLockDate\Tasks;

use App\Containers\AccLockDate\Data\Repositories\AccLockDateRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccLockDateTask extends Task
{

    protected $repository;

    public function __construct(AccLockDateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

