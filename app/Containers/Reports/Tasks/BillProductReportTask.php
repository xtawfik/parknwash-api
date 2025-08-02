<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\BillProduct\Data\Repositories\BillProductRepository;
use App\Ship\Parents\Tasks\Task;

class BillProductReportTask extends Task
{

    protected $repository;

    public function __construct(BillProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
