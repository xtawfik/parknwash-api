<?php

namespace App\Containers\CustodyMovement\Tasks;

use App\Containers\CustodyMovement\Data\Repositories\CustodyMovementRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateCustodyMovementTask extends Task
{

    protected $repository;

    public function __construct(CustodyMovementRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

