<?php

namespace App\Containers\AccReportingCategory\Tasks;

use App\Containers\AccReportingCategory\Data\Repositories\AccReportingCategoryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccReportingCategoryTask extends Task
{

    protected $repository;

    public function __construct(AccReportingCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

