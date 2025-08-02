<?php

namespace App\Containers\AccInventory\Tasks;

use App\Containers\AccInventory\Data\Repositories\AccInventoryRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccInventoriesTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
