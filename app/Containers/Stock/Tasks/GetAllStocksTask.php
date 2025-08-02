<?php

namespace App\Containers\Stock\Tasks;

use App\Containers\Stock\Data\Repositories\StockRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllStocksTask extends Task
{

    protected $repository;

    public function __construct(StockRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
