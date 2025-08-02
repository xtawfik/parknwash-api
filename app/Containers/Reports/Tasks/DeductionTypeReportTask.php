<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\DeductionType\Data\Repositories\DeductionTypeRepository;
use App\Ship\Parents\Tasks\Task;

class DeductionTypeReportTask extends Task
{

    protected $repository;

    public function __construct(DeductionTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
