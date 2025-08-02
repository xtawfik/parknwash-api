<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\VacationType\Data\Repositories\VacationTypeRepository;
use App\Ship\Parents\Tasks\Task;

class VacationTypeReportTask extends Task
{

    protected $repository;

    public function __construct(VacationTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
