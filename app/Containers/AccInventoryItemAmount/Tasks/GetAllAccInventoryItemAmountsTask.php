<?php

namespace App\Containers\AccInventoryItemAmount\Tasks;

use App\Containers\AccInventoryItemAmount\Data\Repositories\AccInventoryItemAmountRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccInventoryItemAmountsTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryItemAmountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
