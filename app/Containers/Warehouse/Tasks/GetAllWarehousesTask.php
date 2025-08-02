<?php

namespace App\Containers\Warehouse\Tasks;

use App\Containers\Warehouse\Data\Repositories\WarehouseRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllWarehousesTask extends Task
{

    protected $repository;

    public function __construct(WarehouseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
