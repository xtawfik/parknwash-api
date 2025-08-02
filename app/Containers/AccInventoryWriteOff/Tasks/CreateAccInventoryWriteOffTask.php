<?php

namespace App\Containers\AccInventoryWriteOff\Tasks;

use App\Containers\AccInventoryWriteOff\Data\Repositories\AccInventoryWriteOffRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccInventoryWriteOffTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryWriteOffRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

