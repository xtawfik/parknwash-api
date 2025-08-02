<?php

namespace App\Containers\AccPayslipItemCategory\Tasks;

use App\Containers\AccPayslipItemCategory\Data\Repositories\AccPayslipItemCategoryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccPayslipItemCategoryTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipItemCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

