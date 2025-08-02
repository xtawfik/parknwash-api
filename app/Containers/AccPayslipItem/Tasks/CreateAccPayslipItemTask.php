<?php

namespace App\Containers\AccPayslipItem\Tasks;

use App\Containers\AccPayslipItem\Data\Repositories\AccPayslipItemRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccPayslipItemTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

