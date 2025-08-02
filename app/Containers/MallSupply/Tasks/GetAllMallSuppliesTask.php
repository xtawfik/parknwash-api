<?php

namespace App\Containers\MallSupply\Tasks;

use App\Containers\MallSupply\Data\Repositories\MallSupplyRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllMallSuppliesTask extends Task
{

    protected $repository;

    public function __construct(MallSupplyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
