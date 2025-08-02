<?php

namespace App\Containers\Bill\Tasks;

use App\Containers\Bill\Data\Repositories\BillRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllBillsTask extends Task
{

    protected $repository;

    public function __construct(BillRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
