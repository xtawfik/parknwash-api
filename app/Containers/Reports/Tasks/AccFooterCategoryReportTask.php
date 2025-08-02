<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccFooterCategory\Data\Repositories\AccFooterCategoryRepository;
use App\Ship\Parents\Tasks\Task;

class AccFooterCategoryReportTask extends Task
{

    protected $repository;

    public function __construct(AccFooterCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
