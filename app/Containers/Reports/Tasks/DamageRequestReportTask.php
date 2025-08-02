<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\DamageRequest\Data\Repositories\DamageRequestRepository;
use App\Ship\Parents\Tasks\Task;

class DamageRequestReportTask extends Task
{

    protected $repository;

    public function __construct(DamageRequestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
