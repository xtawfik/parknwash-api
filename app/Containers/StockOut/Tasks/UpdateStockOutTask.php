<?php

namespace App\Containers\StockOut\Tasks;

use App\Containers\StockOut\Data\Repositories\StockOutRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateStockOutTask extends Task
{

    protected $repository;

    public function __construct(StockOutRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

