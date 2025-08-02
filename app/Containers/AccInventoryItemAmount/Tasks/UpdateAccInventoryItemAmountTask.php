<?php

namespace App\Containers\AccInventoryItemAmount\Tasks;

use App\Containers\AccInventoryItemAmount\Data\Repositories\AccInventoryItemAmountRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccInventoryItemAmountTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryItemAmountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

