<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\UserCar\Data\Repositories\UserCarRepository;
use App\Ship\Parents\Tasks\Task;

class UserCarReportTask extends Task
{

    protected $repository;

    public function __construct(UserCarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
