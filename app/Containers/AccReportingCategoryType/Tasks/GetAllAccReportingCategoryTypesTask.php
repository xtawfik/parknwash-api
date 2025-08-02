<?php

namespace App\Containers\AccReportingCategoryType\Tasks;

use App\Containers\AccReportingCategoryType\Data\Repositories\AccReportingCategoryTypeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccReportingCategoryTypesTask extends Task
{

    protected $repository;

    public function __construct(AccReportingCategoryTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
