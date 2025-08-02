<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Vacation\Data\Repositories\VacationRepository;
use App\Ship\Parents\Tasks\Task;

class VacationReportTask extends Task
{

    protected $repository;

    public function __construct(VacationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
