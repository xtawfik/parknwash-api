<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\City\Data\Repositories\CityRepository;
use App\Ship\Parents\Tasks\Task;

class CityReportTask extends Task
{

    protected $repository;

    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
