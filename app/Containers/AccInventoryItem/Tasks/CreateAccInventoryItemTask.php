<?php

namespace App\Containers\AccInventoryItem\Tasks;

use App\Containers\AccInventoryItem\Data\Repositories\AccInventoryItemRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccInventoryItemTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        if(request()->has("inventories")) {
              $repository->inventories()->sync(request("inventories"));
            }
if(request()->has("inventories")) {
              $repository->inventories()->sync(request("inventories"));
            }


        return $repository;
    }
}

