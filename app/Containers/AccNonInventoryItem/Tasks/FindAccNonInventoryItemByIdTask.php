<?php

namespace App\Containers\AccNonInventoryItem\Tasks;

use App\Containers\AccNonInventoryItem\Data\Repositories\AccNonInventoryItemRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccNonInventoryItemByIdTask extends Task
{

    protected $repository;

    public function __construct(AccNonInventoryItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
