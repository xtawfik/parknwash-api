<?php

namespace App\Containers\AccReportingCategory\Tasks;

use App\Containers\AccReportingCategory\Data\Repositories\AccReportingCategoryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccReportingCategoryTask extends Task
{

    protected $repository;

    public function __construct(AccReportingCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

