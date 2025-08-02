<?php

namespace App\Containers\AccInventoryItem\Tasks;

use App\Containers\AccInventoryItem\Data\Repositories\AccInventoryItemRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccInventoryItemTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        if(request()->has("inventories")) {
              $repository->inventories()->sync(request("inventories"));
            }
if(request()->has("inventories")) {
              $repository->inventories()->sync(request("inventories"));
            }


        return $repository;
    }
}

