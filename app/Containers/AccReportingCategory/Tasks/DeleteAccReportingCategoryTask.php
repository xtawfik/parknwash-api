<?php

namespace App\Containers\AccReportingCategory\Tasks;

use App\Containers\AccReportingCategory\Data\Repositories\AccReportingCategoryRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccReportingCategoryTask extends Task
{

    protected $repository;

    public function __construct(AccReportingCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
