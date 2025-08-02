<?php

namespace App\Containers\SupplyCategory\Tasks;

use App\Containers\SupplyCategory\Data\Repositories\SupplyCategoryRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllSupplyCategoriesTask extends Task
{

    protected $repository;

    public function __construct(SupplyCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
