<?php

namespace App\Containers\AccNonInventoryItem\Tasks;

use App\Containers\AccNonInventoryItem\Data\Repositories\AccNonInventoryItemRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccNonInventoryItemsTask extends Task
{

    protected $repository;

    public function __construct(AccNonInventoryItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
