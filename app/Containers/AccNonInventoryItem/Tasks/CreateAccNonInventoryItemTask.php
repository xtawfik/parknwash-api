<?php

namespace App\Containers\AccNonInventoryItem\Tasks;

use App\Containers\AccNonInventoryItem\Data\Repositories\AccNonInventoryItemRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccNonInventoryItemTask extends Task
{

    protected $repository;

    public function __construct(AccNonInventoryItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

