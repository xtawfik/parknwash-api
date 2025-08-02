<?php

namespace App\Containers\AccPayslipEarning\Tasks;

use App\Containers\AccPayslipEarning\Data\Repositories\AccPayslipEarningRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccPayslipEarningTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipEarningRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

