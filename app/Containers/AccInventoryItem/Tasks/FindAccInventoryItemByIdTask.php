<?php

namespace App\Containers\AccInventoryItem\Tasks;

use App\Containers\AccInventoryItem\Data\Repositories\AccInventoryItemRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccInventoryItemByIdTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryItemRepository $repository)
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
