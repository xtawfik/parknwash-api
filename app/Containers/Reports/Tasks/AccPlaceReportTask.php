<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccPlace\Data\Repositories\AccPlaceRepository;
use App\Ship\Parents\Tasks\Task;

class AccPlaceReportTask extends Task
{

    protected $repository;

    public function __construct(AccPlaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
