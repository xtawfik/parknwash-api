<?php

namespace App\Containers\StockIn\Tasks;

use App\Containers\StockIn\Data\Repositories\StockInRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateStockInTask extends Task
{

    protected $repository;

    public function __construct(StockInRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

