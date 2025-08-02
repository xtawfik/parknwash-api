<?php

namespace App\Containers\BillProduct\Tasks;

use App\Containers\BillProduct\Data\Repositories\BillProductRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllBillProductsTask extends Task
{

    protected $repository;

    public function __construct(BillProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
