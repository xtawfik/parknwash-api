<?php

namespace App\Containers\AccInventory\Tasks;

use App\Containers\AccInventory\Data\Repositories\AccInventoryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccInventoryTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryRepository $repository)
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

