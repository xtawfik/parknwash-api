<?php

namespace App\Containers\AccInventoryTransfer\Tasks;

use App\Containers\AccInventoryTransfer\Data\Repositories\AccInventoryTransferRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccInventoryTransferTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryTransferRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        if(request()->has("inventory_items")) {
              $repository->inventory_items()->sync(request("inventory_items"));
            }


        return $repository;
    }
}

