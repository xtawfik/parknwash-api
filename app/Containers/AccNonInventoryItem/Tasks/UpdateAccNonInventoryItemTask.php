<?php

namespace App\Containers\AccNonInventoryItem\Tasks;

use App\Containers\AccNonInventoryItem\Data\Repositories\AccNonInventoryItemRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccNonInventoryItemTask extends Task
{

    protected $repository;

    public function __construct(AccNonInventoryItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

