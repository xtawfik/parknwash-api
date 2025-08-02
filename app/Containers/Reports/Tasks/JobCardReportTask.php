<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\JobCard\Data\Repositories\JobCardRepository;
use App\Ship\Parents\Tasks\Task;

class JobCardReportTask extends Task
{

    protected $repository;

    public function __construct(JobCardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
