<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\JobDescription\Data\Repositories\JobDescriptionRepository;
use App\Ship\Parents\Tasks\Task;

class JobDescriptionReportTask extends Task
{

    protected $repository;

    public function __construct(JobDescriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
