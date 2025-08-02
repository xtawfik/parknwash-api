<?php

namespace App\Containers\AccInventoryWriteOff\Tasks;

use App\Containers\AccInventoryWriteOff\Data\Repositories\AccInventoryWriteOffRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccInventoryWriteOffTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryWriteOffRepository $repository)
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
