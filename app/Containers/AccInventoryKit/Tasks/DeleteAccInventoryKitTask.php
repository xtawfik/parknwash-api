<?php

namespace App\Containers\AccInventoryKit\Tasks;

use App\Containers\AccInventoryKit\Data\Repositories\AccInventoryKitRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccInventoryKitTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryKitRepository $repository)
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
