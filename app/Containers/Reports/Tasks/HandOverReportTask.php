<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\HandOver\Data\Repositories\HandOverRepository;
use App\Ship\Parents\Tasks\Task;

class HandOverReportTask extends Task
{

    protected $repository;

    public function __construct(HandOverRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
