<?php

namespace App\Containers\MallStock\Tasks;

use App\Containers\MallStock\Data\Repositories\MallStockRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllMallStocksTask extends Task
{

    protected $repository;

    public function __construct(MallStockRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
