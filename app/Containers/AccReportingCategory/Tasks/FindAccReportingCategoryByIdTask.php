<?php

namespace App\Containers\AccReportingCategory\Tasks;

use App\Containers\AccReportingCategory\Data\Repositories\AccReportingCategoryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccReportingCategoryByIdTask extends Task
{

    protected $repository;

    public function __construct(AccReportingCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
