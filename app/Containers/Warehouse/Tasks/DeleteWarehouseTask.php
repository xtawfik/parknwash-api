<?php

namespace App\Containers\Warehouse\Tasks;

use App\Containers\Warehouse\Data\Repositories\WarehouseRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteWarehouseTask extends Task
{

    protected $repository;

    public function __construct(WarehouseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
