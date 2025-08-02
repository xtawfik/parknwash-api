<?php

namespace App\Containers\AccInventoryItemAmount\Tasks;

use App\Containers\AccInventoryItemAmount\Data\Repositories\AccInventoryItemAmountRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccInventoryItemAmountTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryItemAmountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

