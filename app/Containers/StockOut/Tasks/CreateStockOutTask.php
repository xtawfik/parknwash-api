<?php

namespace App\Containers\StockOut\Tasks;

use App\Containers\StockOut\Data\Repositories\StockOutRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateStockOutTask extends Task
{

    protected $repository;

    public function __construct(StockOutRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

