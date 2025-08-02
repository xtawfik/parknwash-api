<?php

namespace App\Containers\AccReportingCategoryType\Tasks;

use App\Containers\AccReportingCategoryType\Data\Repositories\AccReportingCategoryTypeRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccReportingCategoryTypeTask extends Task
{

    protected $repository;

    public function __construct(AccReportingCategoryTypeRepository $repository)
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
