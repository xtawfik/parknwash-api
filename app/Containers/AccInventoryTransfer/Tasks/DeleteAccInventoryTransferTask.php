<?php

namespace App\Containers\AccInventoryTransfer\Tasks;

use App\Containers\AccInventoryTransfer\Data\Repositories\AccInventoryTransferRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccInventoryTransferTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryTransferRepository $repository)
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
