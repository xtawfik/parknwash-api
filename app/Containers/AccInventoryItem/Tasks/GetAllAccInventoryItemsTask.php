<?php

namespace App\Containers\AccInventoryItem\Tasks;

use App\Containers\AccInventoryItem\Data\Repositories\AccInventoryItemRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccInventoryItemsTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
