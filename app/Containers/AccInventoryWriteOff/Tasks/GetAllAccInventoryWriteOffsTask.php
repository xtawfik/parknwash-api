<?php

namespace App\Containers\AccInventoryWriteOff\Tasks;

use App\Containers\AccInventoryWriteOff\Data\Repositories\AccInventoryWriteOffRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccInventoryWriteOffsTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryWriteOffRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
