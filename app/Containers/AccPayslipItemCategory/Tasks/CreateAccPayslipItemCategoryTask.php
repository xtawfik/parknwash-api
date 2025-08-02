<?php

namespace App\Containers\AccPayslipItemCategory\Tasks;

use App\Containers\AccPayslipItemCategory\Data\Repositories\AccPayslipItemCategoryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccPayslipItemCategoryTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipItemCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

