<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccAccountCategory\Data\Repositories\AccAccountCategoryRepository;
use App\Ship\Parents\Tasks\Task;

class AccAccountCategoryReportTask extends Task
{

    protected $repository;

    public function __construct(AccAccountCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
