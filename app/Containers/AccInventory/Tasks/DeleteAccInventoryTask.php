<?php

namespace App\Containers\AccInventory\Tasks;

use App\Containers\AccInventory\Data\Repositories\AccInventoryRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccInventoryTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryRepository $repository)
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
