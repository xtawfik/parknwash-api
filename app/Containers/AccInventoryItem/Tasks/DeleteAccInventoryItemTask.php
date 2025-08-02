<?php

namespace App\Containers\AccInventoryItem\Tasks;

use App\Containers\AccInventoryItem\Data\Repositories\AccInventoryItemRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccInventoryItemTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryItemRepository $repository)
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
