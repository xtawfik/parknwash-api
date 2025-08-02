<?php

namespace App\Containers\MallStock\Tasks;

use App\Containers\MallStock\Data\Repositories\MallStockRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateMallStockTask extends Task
{

    protected $repository;

    public function __construct(MallStockRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

