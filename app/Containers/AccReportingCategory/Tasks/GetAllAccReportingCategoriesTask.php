<?php

namespace App\Containers\AccReportingCategory\Tasks;

use App\Containers\AccReportingCategory\Data\Repositories\AccReportingCategoryRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccReportingCategoriesTask extends Task
{

    protected $repository;

    public function __construct(AccReportingCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
