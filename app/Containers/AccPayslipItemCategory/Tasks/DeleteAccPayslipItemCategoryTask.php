<?php

namespace App\Containers\AccPayslipItemCategory\Tasks;

use App\Containers\AccPayslipItemCategory\Data\Repositories\AccPayslipItemCategoryRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccPayslipItemCategoryTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipItemCategoryRepository $repository)
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
