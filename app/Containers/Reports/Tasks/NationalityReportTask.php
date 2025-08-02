<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Nationality\Data\Repositories\NationalityRepository;
use App\Ship\Parents\Tasks\Task;

class NationalityReportTask extends Task
{

    protected $repository;

    public function __construct(NationalityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
