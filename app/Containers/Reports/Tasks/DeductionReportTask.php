<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Deduction\Data\Repositories\DeductionRepository;
use App\Ship\Parents\Tasks\Task;

class DeductionReportTask extends Task
{

    protected $repository;

    public function __construct(DeductionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
