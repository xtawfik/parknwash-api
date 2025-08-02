<?php

namespace App\Containers\CustodyMovement\Tasks;

use App\Containers\CustodyMovement\Data\Repositories\CustodyMovementRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCustodyMovementTask extends Task
{

    protected $repository;

    public function __construct(CustodyMovementRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

