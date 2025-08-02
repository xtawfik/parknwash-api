<?php

namespace App\Containers\AccLockDate\Tasks;

use App\Containers\AccLockDate\Data\Repositories\AccLockDateRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccLockDateTask extends Task
{

    protected $repository;

    public function __construct(AccLockDateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

