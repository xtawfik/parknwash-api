<?php

namespace App\Containers\AccInventoryKit\Tasks;

use App\Containers\AccInventoryKit\Data\Repositories\AccInventoryKitRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccInventoryKitsTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryKitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
