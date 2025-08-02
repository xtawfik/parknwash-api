<?php

namespace App\Containers\AccInventoryKit\Tasks;

use App\Containers\AccInventoryKit\Data\Repositories\AccInventoryKitRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccInventoryKitByIdTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryKitRepository $repository)
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
