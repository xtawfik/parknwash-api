<?php

namespace App\Containers\AccInventoryItemAmount\Tasks;

use App\Containers\AccInventoryItemAmount\Data\Repositories\AccInventoryItemAmountRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccInventoryItemAmountByIdTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryItemAmountRepository $repository)
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
