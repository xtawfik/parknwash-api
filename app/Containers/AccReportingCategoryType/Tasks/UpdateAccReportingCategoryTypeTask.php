<?php

namespace App\Containers\AccReportingCategoryType\Tasks;

use App\Containers\AccReportingCategoryType\Data\Repositories\AccReportingCategoryTypeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccReportingCategoryTypeTask extends Task
{

    protected $repository;

    public function __construct(AccReportingCategoryTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

