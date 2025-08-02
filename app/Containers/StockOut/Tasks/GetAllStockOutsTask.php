<?php

namespace App\Containers\StockOut\Tasks;

use App\Containers\StockOut\Data\Repositories\StockOutRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllStockOutsTask extends Task
{

    protected $repository;

    public function __construct(StockOutRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
