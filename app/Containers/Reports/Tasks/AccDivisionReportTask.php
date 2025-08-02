<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccDivision\Data\Repositories\AccDivisionRepository;
use App\Ship\Parents\Tasks\Task;

class AccDivisionReportTask extends Task
{

    protected $repository;

    public function __construct(AccDivisionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
