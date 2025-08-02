<?php

namespace App\Containers\AccPayslipItemCategory\Tasks;

use App\Containers\AccPayslipItemCategory\Data\Repositories\AccPayslipItemCategoryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccPayslipItemCategoryByIdTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipItemCategoryRepository $repository)
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
