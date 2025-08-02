<?php

namespace App\Containers\Stock\Tasks;

use App\Containers\Stock\Data\Repositories\StockRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindStockByIdTask extends Task
{

    protected $repository;

    public function __construct(StockRepository $repository)
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
