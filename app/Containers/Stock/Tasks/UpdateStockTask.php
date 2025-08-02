<?php

namespace App\Containers\Stock\Tasks;

use App\Containers\Stock\Data\Repositories\StockRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateStockTask extends Task
{

    protected $repository;

    public function __construct(StockRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

