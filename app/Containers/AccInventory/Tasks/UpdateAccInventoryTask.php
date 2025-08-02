<?php

namespace App\Containers\AccInventory\Tasks;

use App\Containers\AccInventory\Data\Repositories\AccInventoryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccInventoryTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryRepository $repository)
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

