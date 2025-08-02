<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\GeneralOption\Data\Repositories\GeneralOptionRepository;
use App\Ship\Parents\Tasks\Task;

class GeneralOptionReportTask extends Task
{

    protected $repository;

    public function __construct(GeneralOptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
