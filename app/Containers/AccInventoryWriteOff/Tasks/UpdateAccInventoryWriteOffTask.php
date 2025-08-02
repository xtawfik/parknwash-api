<?php

namespace App\Containers\AccInventoryWriteOff\Tasks;

use App\Containers\AccInventoryWriteOff\Data\Repositories\AccInventoryWriteOffRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccInventoryWriteOffTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryWriteOffRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

