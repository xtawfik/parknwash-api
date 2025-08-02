<?php

namespace App\Containers\AccInventoryWriteOff\Tasks;

use App\Containers\AccInventoryWriteOff\Data\Repositories\AccInventoryWriteOffRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccInventoryWriteOffByIdTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryWriteOffRepository $repository)
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
