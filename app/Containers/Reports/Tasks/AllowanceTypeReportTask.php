<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AllowanceType\Data\Repositories\AllowanceTypeRepository;
use App\Ship\Parents\Tasks\Task;

class AllowanceTypeReportTask extends Task
{

    protected $repository;

    public function __construct(AllowanceTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
