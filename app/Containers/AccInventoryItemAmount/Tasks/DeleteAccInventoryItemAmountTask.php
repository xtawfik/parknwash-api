<?php

namespace App\Containers\AccInventoryItemAmount\Tasks;

use App\Containers\AccInventoryItemAmount\Data\Repositories\AccInventoryItemAmountRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccInventoryItemAmountTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryItemAmountRepository $repository)
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
