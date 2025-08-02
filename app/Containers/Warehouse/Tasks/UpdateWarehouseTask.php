<?php

namespace App\Containers\Warehouse\Tasks;

use App\Containers\Warehouse\Data\Repositories\WarehouseRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateWarehouseTask extends Task
{

    protected $repository;

    public function __construct(WarehouseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

