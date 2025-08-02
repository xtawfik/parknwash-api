<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccFooter\Data\Repositories\AccFooterRepository;
use App\Ship\Parents\Tasks\Task;

class AccFooterReportTask extends Task
{

    protected $repository;

    public function __construct(AccFooterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
