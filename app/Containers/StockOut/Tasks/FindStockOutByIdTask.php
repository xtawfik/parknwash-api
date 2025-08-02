<?php

namespace App\Containers\StockOut\Tasks;

use App\Containers\StockOut\Data\Repositories\StockOutRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindStockOutByIdTask extends Task
{

    protected $repository;

    public function __construct(StockOutRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
