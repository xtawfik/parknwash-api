<?php

namespace App\Containers\AccInventoryKit\Tasks;

use App\Containers\AccInventoryKit\Data\Repositories\AccInventoryKitRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccInventoryKitTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryKitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

