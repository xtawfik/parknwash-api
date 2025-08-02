<?php

namespace App\Containers\AccInventoryKit\Tasks;

use App\Containers\AccInventoryKit\Data\Repositories\AccInventoryKitRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccInventoryKitTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryKitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

