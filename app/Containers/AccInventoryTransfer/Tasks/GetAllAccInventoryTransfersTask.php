<?php

namespace App\Containers\AccInventoryTransfer\Tasks;

use App\Containers\AccInventoryTransfer\Data\Repositories\AccInventoryTransferRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccInventoryTransfersTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryTransferRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
