<?php

namespace App\Containers\Warehouse\Tasks;

use App\Containers\Warehouse\Data\Repositories\WarehouseRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateWarehouseTask extends Task
{

    protected $repository;

    public function __construct(WarehouseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

