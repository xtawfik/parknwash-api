<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccSupplier\Data\Repositories\AccSupplierRepository;
use App\Ship\Parents\Tasks\Task;

class AccSupplierReportTask extends Task
{

    protected $repository;

    public function __construct(AccSupplierRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
