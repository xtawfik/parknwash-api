<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccControlType\Data\Repositories\AccControlTypeRepository;
use App\Ship\Parents\Tasks\Task;

class AccControlTypeReportTask extends Task
{

    protected $repository;

    public function __construct(AccControlTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
