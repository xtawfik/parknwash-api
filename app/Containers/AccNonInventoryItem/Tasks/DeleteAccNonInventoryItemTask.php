<?php

namespace App\Containers\AccNonInventoryItem\Tasks;

use App\Containers\AccNonInventoryItem\Data\Repositories\AccNonInventoryItemRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccNonInventoryItemTask extends Task
{

    protected $repository;

    public function __construct(AccNonInventoryItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
