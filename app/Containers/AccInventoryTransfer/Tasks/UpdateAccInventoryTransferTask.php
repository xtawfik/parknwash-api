<?php

namespace App\Containers\AccInventoryTransfer\Tasks;

use App\Containers\AccInventoryTransfer\Data\Repositories\AccInventoryTransferRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccInventoryTransferTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryTransferRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        if(request()->has("inventory_items")) {
              $repository->inventory_items()->sync(request("inventory_items"));
            }


        return $repository;
    }
}

