<?php

namespace App\Containers\AccPayslipEarning\Tasks;

use App\Containers\AccPayslipEarning\Data\Repositories\AccPayslipEarningRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccPayslipEarningTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipEarningRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

