<?php

namespace App\Containers\Damaged\Tasks;

use App\Containers\Damaged\Data\Repositories\DamagedRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateDamagedTask extends Task
{

    protected $repository;

    public function __construct(DamagedRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

