<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Car\Data\Repositories\CarRepository;
use App\Ship\Parents\Tasks\Task;

class CarReportTask extends Task
{

    protected $repository;

    public function __construct(CarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
